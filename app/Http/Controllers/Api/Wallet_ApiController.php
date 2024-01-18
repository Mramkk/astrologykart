<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\EasyData;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\Userdetail;
use Razorpay\Api\Api;

class Wallet_ApiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->action == 'ORDER_LIST') {
        }

        $ob = new EasyData;
        $ob->message('Invalid action type');
        return $ob->json_output();
    }

    public function store(Request $request)
    {
        // Generate New Order for Payment
        if ($request->action == 'CREATE_PAYMENT') {
            $x = new EasyData;
            $x->request = $request;
            $uid = auth()->user()->uid;
            // $username = auth()->user()->name;
            // $email = auth()->user()->email;
            $x->vdata('amount', 'required|numeric');
            $order_id = '';
            $amount = 0;

            // if (!empty($username)) {
                if ($x->validate()) {
                    $plan = Plan::where('amount', $request->amount)->first();
                    if (!empty($plan)) {
                        // Initialize New Payment
                        $receipt = time() . $uid;
                        $amount = $request->amount;
                        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
                        $response = $api->order->create(array(
                            'receipt' => $receipt,
                            'amount' => $amount * 100,
                            'currency' => 'INR',
                            'notes' => array('uid' => $uid)
                        ));

                        if (!empty($response->id) and isset($response->id)) {
                            $pay = new EasyData;
                            $pay->request = $request;
                            $pay->model = new Payment;
                            $pay->datax('uid', $uid);
                            $pay->datax('order_id', $response->id);
                            $pay->datax('amount', $request->amount);
                            $pay->datax('payment_type', 'recharge');
                            $pay->datax('status', $response->status);
                            if ($pay->save()) {
                                $order_id = $response->id;
                                $x->status(true);
                                $x->message('New Payment Initialized.');
                            }
                        } else {
                            $x->message('Order Creation Failed..!');
                        }
                    }else{
                        $x->message('Invalid Plan Type.');
                    }
                }
            // } else {
            //     $x->message('Update your profile details - Name');
            // }
            return $x->json_output([
                'data' => ['amount' => $amount, 'order_id' => $order_id],
            ]);
        }

        // Cart List to ---> Place Order
        if ($request->action == 'GET_PAYMENT') {
            $x = new EasyData;
            $x->request = $request;
            $x->vdata('order_id', 'required|string|max:100');
            $x->vdata('payment_id', 'required|string|max:100');
            $uid = auth()->user()->uid;
            if ($x->validate()) {
                $payment = Payment::where('order_id', $request->order_id)->first();
                if (!empty($payment)) {
                    if ($payment->status == 'created') {
                        // Check Payment Status By Payment Id
                        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
                        $response = $api->payment->fetch($request->payment_id);
                        if (!empty($response->id) and isset($response->id)) {
                            $payment->payment_id = $response->id;
                            $payment->status = $response->status;
                            $payment->order_id = $response->order_id;
                            $payment->method = $response->method;
                            $payment->amount_refunded = $response->amount_refunded;
                            $payment->refund_status = $response->refund_status;
                            $payment->captured = $response->captured;
                            $payment->description = $response->description;
                            $payment->email = $response->email;
                            $payment->contact = $response->contact;
                            if ($payment->save()) {
                                $userdetail = Userdetail::where('uid', $payment->uid)->first();
                                if (!empty($userdetail)) {
                                    $plan = Plan::where('amount', $payment->amount)->first();
                                    $extra = 0;
                                    if (!empty($plan)) {
                                        $extra = ($payment->amount * $plan->extra) / 100;
                                    }
                                    $userdetail->balance = $payment->amount + $userdetail->balance + intval($extra);
                                    $userdetail->save();
                                    $x->status(true);
                                    $x->message('Recharge Successfull');
                                }
                            }
                        }
                    } else {
                        $x->message('Invalid Payment Process.');
                    }
                } else {
                    $x->message('Invalid Order Id');
                }
            }
            return $x->json_output();
        }

        $ob = new EasyData;
        $ob->message('Invalid action type');
        return $ob->json_output();
    }
}

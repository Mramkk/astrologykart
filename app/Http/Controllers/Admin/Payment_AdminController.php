<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\EasyData;
use App\Models\Payment;
use Razorpay\Api\Api;
use App\Http\Controllers\Api\Wallet_ApiController;
use App\Models\Userdetail;

class Payment_AdminController extends Controller
{
    // ======== Settings ===========
    public $view_dir = 'admin.payment.';
    public $msg_txt = 'Payment';
    public $table_name = 'payments';
    // ======== End Settings ===========

    public function index(Request $request)
    {
        $data_list = '';
        if (!empty($request->q)) {
            $search = $request->q;
            $data_list = Payment::where('payment_id', 'LIKE', '%' . $search . '%')->orWhere('order_id', 'LIKE', '%' . $search . '%')
            ->orWhere('amount', 'LIKE', '%' . $search . '%')->orWhere('created_at', 'LIKE', '%' . date('Y-m-d', strtotime($search)) . '%');
        } else {
            $data_list = Payment::orderBy('id', 'DESC');
        }
        $data_list = $data_list->paginate(50);
        return view($this->view_dir . 'index', compact('data_list'));
    }

    public function store(Request $request)
    {
        if ($request->action == 'REFRESH_PAYMENTS') {
            $x = new EasyData;
            $x->request = $request;
            $next_refresh = false;
            $dtime = time() - (15 * 60);
            $dt = date('Y-m-d', $dtime);
            $tm = date('H:i:s', $dtime);
            $payment = Payment::where('status', 'created')->whereDate('created_at', '<', $dt)->whereTime('created_at', '<', $tm)->first();
            if (!empty($payment)) {
                $x->status(true);
                $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
                if (!empty($payment->order_id)) {
                    $response = '';
                    try {
                        $response = $api->order->fetch($payment->order_id)->payments();
                        if ($response->count > 0) {
                            if (!empty($response->items[0])) {
                                $response = $response->items[0];
                                if ($response->status == 'captured' or $response->status == 'authorized' or $response->status == 'refunded') {
                                    $order_id = $payment->order_id;
                                    $payment_id = $response->items[0]->id;
                                    // On Payment Success
                                    if (strtolower($payment->payment_type) == 'recharge') {
                                        $request->merge([
                                            'action' => 'GET_PAYMENT',
                                            'payment_id' => $payment_id,
                                            'order_id' => $order_id
                                        ]);
                                        $wallet = new Wallet_ApiController;
                                        $data = $wallet->store($request);
                                        dd($data);
                                    }
                                } else {
                                    $payment->status = 'failed';
                                    $payment->save();
                                }
                            }
                        } else {
                            $payment->status = 'failed';
                            $payment->save();
                        }
                    } catch (\Throwable $th) {
                        //throw $th;
                        $payment->status = 'failed';
                        $payment->save();
                    }
                }
                $next_pay = Payment::where('id', '!=', $payment->id)->where('status', 'created')->whereDate('created_at', '<', $dt)->whereTime('created_at', '<', $tm)->first();
                $next_refresh = !empty($next_pay) ? $payment->id : false;
            }
            return $x->json_output(['next_refresh' => $next_refresh]);
        }

        if ($request->action == 'PAYMENT_DETAILS') {
            $x = new EasyData;
            $x->request = $request;
            $x->vdata('id', 'required|numeric');
            $html = '';
            if ($x->validate()) {
                $payment = Payment::find($request->id);
                $user = Userdetail::where('uid', $payment->uid)->first();
                $html = '<div class="col-md-6 text-md-end">
                    <label>Name : </label>
                </div>
                <div class="col-md-6">
                    '.$user->name.'
                </div>

                <div class="col-md-6 text-md-end">
                    <label>Mobile : </label>
                </div>
                <div class="col-md-6">
                    '.$user->mobile.'
                </div>

                <div class="col-md-6 text-md-end">
                    <label>Amount : </label>
                </div>
                <div class="col-md-6">
                    '.$payment->amount.'
                </div>

                <div class="col-md-6 text-md-end">
                    <label>Transaction Id : </label>
                </div>
                <div class="col-md-6">
                    '.$payment->payment_id.'
                </div>

                <div class="col-md-6 text-md-end">
                    <label>Datetime : </label>
                </div>
                <div class="col-md-6">
                    '.date('d M Y h:i A', strtotime($payment->created_at)).'
                </div>

                <div class="col-md-6 text-md-end">
                    <label>Description : </label>
                </div>
                <div class="col-md-6">
                    '.$payment->description.'
                </div>

                <div class="col-md-6 text-md-end">
                    <label>Status : </label>
                </div>
                <div class="col-md-6 pay_failed pay_'.$payment->status.'">
                    '.$payment->status.'
                </div>

                <div class="col-md-6 text-md-end">
                    <label>Email : </label>
                </div>
                <div class="col-md-6">
                    '.$payment->email.'
                </div>

                <div class="col-md-6 text-md-end">
                    <label>Contact : </label>
                </div>
                <div class="col-md-6">
                    '.$payment->contact.'
                </div>';
            }
            return $x->json_output(['html' => $html]);
        }

        $ob = new EasyData;
        $ob->message('Invalid action type');
        return $ob->json_output();
    }
}

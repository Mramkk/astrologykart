<?php

namespace App\Http\Controllers\Api\Payment;

use App\Helpers\ApiRes;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Userdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;

class ApiPaymentController extends Controller
{
    public function generateOrder(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->first('amount')) {
                return ApiRes::failed($errors->first('amount'));
            }
        }

        $user = Userdetail::where('uid', $req->user()->uid)->first();
        $api = new Api(env('MRAZORPAY_KEY'), env('MRAZORPAY_SECRET'));
        $receipt = uniqid();
        $orderData = [
            'receipt'         => $receipt,
            'amount'          => $req->amount * 100,
            'currency'        => 'INR'
        ];

        try {
            $orderRes = $api->order->create($orderData);
            $data = [
                'key_id' => env('MRAZORPAY_KEY'),
                'orderid' => $orderRes->id,
                'amount' => $orderRes->amount,
                'name' => $user->name,
                'email' => $user->email,
                'mobile' =>  "+91" . $user->mobile,
            ];
            return ApiRes::data('Order generated successfully !', $data);
        } catch (\Throwable $th) {
            return ApiRes::failed($th->getMessage());
            // return ApiRes::error();
        }
    }
    public function payment(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'payment_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->first('payment_id')) {
                return ApiRes::failed($errors->first('payment_id'));
            }
        }
        try {
            $api = new Api(env('MRAZORPAY_KEY'), env('MRAZORPAY_SECRET'));
            $pay = $api->payment->fetch($req->payment_id);
            $payment = new Payment();
            $payment->uid = $req->user()->uid;
            $payment->payment_id = $pay->id;
            $payment->order_id = $pay->order_id;
            $payment->method = $pay->method;
            $payment->amount = ($pay->amount / 100);
            $payment->amount_refunded = $pay->amount_refunded;
            $payment->refund_status = $pay->refund_status;
            $payment->refund_status = $pay->refund_status;
            $payment->captured = $pay->captured == true ? 1 : 0;
            $payment->description = $pay->description;
            $payment->email = $pay->email;
            $payment->contact = $pay->contact;
            $payment->payment_type = 'recharge';
            $payment->status = $pay->status;
            $payment->save();
            return ApiRes::success('Payment successfully !');
        } catch (\Throwable $th) {
            return ApiRes::failed($th->getMessage());
            // return ApiRes::error();
        }
    }
}

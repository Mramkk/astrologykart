<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\EasyData;
use App\Http\Controllers\Api\Wallet_ApiController;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\Userdetail;

class Wallet_WebController extends Controller
{
    public function recharge_page(Request $request)
    {
        $uid = auth()->user()->uid;
        $user = Userdetail::where('uid', $uid)->first();
        $recharge = Plan::orderBy('amount','ASC')->get();
        // $recharge = [50,100,200,300,500,1000,2000,3000,4000,8000,15000,20000,50000,100000];
        return view('web.user.recharge',compact('user', 'recharge'));
    }
    
    public function recharge_success(Request $req)
    {
        $uid = auth()->user()->uid;
        $user = Userdetail::where('uid', $uid)->first();
        
        return view('web.user.recharge-success',compact('user'));
    }
    
    public function payment_history_page(Request $request)
    {
        $uid = auth()->user()->uid;
        $user = Userdetail::where('uid', $uid)->first();
        $payments = Payment::where('uid',$uid)->orderBy('id','DESC')->take(50)->get();
        return view('web.user.payment-history',compact('user', 'payments'));
    }

    public function store(Request $request)
    {
        if ($request->action == 'CREATE_PAYMENT') {
            $ob = new Wallet_ApiController;
            $data = $ob->store($request);
            return $data;
        }

        if ($request->action == 'GET_PAYMENT') {
            $ob = new Wallet_ApiController;
            $data = $ob->store($request);
            return $data;
        }

        $ob = new EasyData;
        $ob->message('Invalid Action Type');
        return $ob->json_output();
    }
}

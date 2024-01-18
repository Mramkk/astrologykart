<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\EasyData;
use App\Models\Userdetail;

use App\Http\Controllers\Api\User_ApiController;

class User_WebController extends Controller
{
    public function account_page(Request $request)
    {
        $uid = auth()->user()->uid;
        $user = '';
        if(!empty($uid)){
            $user = Userdetail::where('uid',$uid)->first();
            if(empty($user)){
                $u = new Userdetail;
                $u->uid = $uid;
                $u->mobile = auth()->user()->mobile;
                $u->save();
                $user = Userdetail::where('uid',$uid)->first();
            }
        }
        return view('web.user.account',compact('user'));
    }

    public function store(Request $request)
    {
        if ($request->action == 'UPDATE_PRO_IMG') {
            $ob = new User_ApiController;
            $data = $ob->store($request);
            return $data;
        }

        if ($request->action == 'UPDATE_USER_DETAILS') {
            $request->merge([
                'action' => 'UPDATE',
            ]);
            $ob = new User_ApiController;
            $data = $ob->store($request);
            return $data;
        }

        if ($request->action == 'CREATE_PAYMENT') {

            $x = new EasyData;
            $x->request = $request;
            $x->model = new Payment;

            // Initialize New Payment
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $response = $api->order->create(array(
                'receipt' => $cart_id,
                'amount' => $total_amount * 100,
                'currency' => 'INR',
                'notes' => array('uid' => $uid, 'cart_id' => $cart_id)
            ));

            $ob = new User_ApiController;
            $data = $ob->store($request);
            return $data;
        }

        $ob = new EasyData;
        $ob->message('Invalid Action Type');
        return $ob->json_output();
    }
}

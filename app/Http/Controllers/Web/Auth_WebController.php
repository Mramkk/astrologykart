<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\Classes\EasyData;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Api\Auth_ApiController;

class Auth_WebController extends Controller
{
    // Register & Login by OTP
    public function login(Request $request){
        if(!empty($request->action)){
            if($request->action == 'SEND_OTP'){
                $request->session()->put('mobile', $request->mobile);
                $x = new EasyData;
                $auth = new Auth_ApiController;
                $login = $auth->login($request);
                $login = $login->getData();
                $x->message($login->message);
                if($login->status == true){
                    $x->status(true);
                    $x->message($login->message);
                }
                return $x->json_output();
            }
            if($request->action == 'VERIFY_OTP'){
                $x = new EasyData;
                $auth = new Auth_ApiController;
                $request->merge(["mobile" => $request->session()->get('mobile')]);
                $otp = $auth->verify_login_otp($request,false);
                $otp = $otp->getData();
                $x->message($otp->message);
                if($otp->status == true){
                    $user = User::where('mobile',$request->mobile)->first();
                    if(!empty($user)){
                        $remember = $request->remember == true ? true : false;
                        Auth::login($user,$remember);
                        $x->status(true);
                        $x->message('Logged in Successfully');
                    }
                }
                return $x->json_output();
            }
        }

        $ob = new EasyData;
        $ob->status(false);
        $ob->message('Invalid Action Type');
        return $ob->json_output();
    }

    // Logout
    public function logout(Request $request)
    {
        $x = new EasyData;
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $x->status(true);
        $x->message('Logout Successfully.');
        return redirect(asset('/'));
    }
}

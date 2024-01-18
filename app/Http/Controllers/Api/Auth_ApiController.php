<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Userdetail;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Classes\EasyData;
use App\Http\Controllers\SmsController;


class Auth_ApiController extends Controller
{
    public function login(Request $request){
        $x = new EasyData;
        $x->request = $request;
        $x->vdata('mobile',['required', 'numeric', 'digits:10']);
        $token = '';
        $uidx = '';
        $exist = false;
        $sms = new SmsController;
        if($x->validate() == true){

            $user = User::where('mobile', $request->mobile)->first();
            $otp = rand(1000,9999);

            if (!empty($user) and $user->mobile == $request->mobile){
                // $maxtry = $user->maxtry;
                $user->otp = $otp;
                $user->save();

                // Send OTP
                $sms->mobile($request->mobile);
                $sms->message($otp);
                $sms->message_type('LOGIN_OTP');
                $sms->send();

                $uidx = $user->uid;
                $exist = true;
            }else{
                // if User not registered
                $userx = new User;
                $userdetail = new Userdetail;
                $userx->mobile = $request->mobile;
                $userx->status = 'unverified';
                $userx->otp = $otp;
                if($userx->save()){
                    $user = User::find($userx->id);
                    $user->uid = $uidx = date('ymd').$userx->id;
                    $user->save();

                    // Send OTP
                    $sms->mobile($request->mobile);
                    $sms->message($otp);
                    $sms->message_type('LOGIN_OTP');
                    $sms->send();

                    $userdetail->uid = $user->uid;
                    $userdetail->status = 1;
                    $userdetail->mobile = $request->mobile;
                    $userdetail->save();
                }
            }
            if(!empty($user)){
                $x->status(true);
                $x->message('Otp has been sent to your Mobile.');
            }
        }
        return $x->json_output(['uid'=>$uidx, 'exist'=>$exist]);
    }

    public function verify_login_otp(Request $request,$generate_token=true){
        $x = new EasyData;
        $x->request = $request;
        $x->vdata('mobile','required|numeric');
        $x->vdata('otp','required|numeric');
        $uid = '';
        $token = '';
        if($x->validate() == true){
            $user = User::where('mobile',$request->mobile)->where('otp',$request->otp)->first();
            $x->message('Invalid OTP');
            if(!empty($user)){
                $otp = $user->otp;
                if($otp == $request->otp){
                    $user->otp = null;
                    $user->status = 'verified';
                    // $user->maxtry = 0;
                    if($user->save()){
                        $token = $generate_token == true ? $user->createToken($request->mobile)->plainTextToken : null;
                        $x->status(true);
                        $x->message('OTP Verified');
                        $uid = $user->uid;
                    }
                }
            }
        }
        return $x->json_output(['uid'=>$uid,'token'=>$token]);
    }

    public function logout(Request $request){
        $x = new EasyData;
        $uid = '';
        if(Auth::check()){
            $uid = $x->uid();
            $request->user()->currentAccessToken()->delete();
            $x->status(true);
            $x->message('Logout Successfully');
        }
        return $x->json_output(['uid'=>$uid]);
    }

}

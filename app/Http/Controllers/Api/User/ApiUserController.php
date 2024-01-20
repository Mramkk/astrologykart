<?php

namespace App\Http\Controllers\Api\User;

use App\Helpers\ApiRes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SmsController;
use App\Models\Astrologer;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\User;
use App\Models\Userdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ApiUserController extends Controller
{


    public function register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'mobile' => 'required|digits:10|unique:users',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->first('mobile')) {
                return ApiRes::failed($errors->first('mobile'));
            }
        }

        $uid =  mt_rand(100000000, 999999999);
        $user = new User();
        $user->uid = $uid;
        $user->mobile = $req->mobile;
        $status = $user->save();
        if ($status) {
            $user = new Userdetail();
            $user->uid = $uid;
            $user->mobile = $req->mobile;
            $user->birth_date = "0000-00-00";
            $user->birth_time = "00:00 AM";
            $status = $user->save();
            if ($status) {
                return ApiRes::success("You Register Successfully !");
            } else {
                return ApiRes::error();
            }
        } else {
            return ApiRes::error();
        }
    }

    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'birth_date' => 'required|date_format:Y-m-d|before:today',
            'birth_time' => 'required|date_format:h:i A',
            'birth_place' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'pincode' => 'required|numeric|digits:6',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->first('name')) {
                return ApiRes::failed($errors->first('name'));
            } elseif ($errors->first('email')) {
                return ApiRes::failed($errors->first('email'));
            } elseif ($errors->first('mobile')) {
                return ApiRes::failed($errors->first('mobile'));
            } elseif ($errors->first('birth_date')) {
                return ApiRes::failed($errors->first('birth_date'));
            } elseif ($errors->first('birth_time')) {
                return ApiRes::failed($errors->first('birth_time'));
            } elseif ($errors->first('birth_place')) {
                return ApiRes::failed($errors->first('birth_place'));
            } elseif ($errors->first('gender')) {
                return ApiRes::failed($errors->first('gender'));
            } elseif ($errors->first('country')) {
                return ApiRes::failed($errors->first('country'));
            } elseif ($errors->first('state')) {
                return ApiRes::failed($errors->first('state'));
            } elseif ($errors->first('city')) {
                return ApiRes::failed($errors->first('city'));
            } elseif ($errors->first('pincode')) {
                return ApiRes::failed($errors->first('pincode'));
            }
        }


        $user =  Userdetail::Where('uid', auth()->user()->uid)->first();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->gender = $req->gender;
        $user->birth_date = $req->birth_date;
        $user->birth_time = $req->birth_time;
        $user->birth_place = $req->birth_place;
        $user->city = $req->city;
        $user->state = $req->state;
        $user->country = $req->country;
        $user->pincode = $req->pincode;

        $status = $user->update();
        if ($status) {
            return ApiRes::success("Data Updated Successfully !");
        } else {
            return ApiRes::error();
        }
    }



    public function sendOtp(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'mobile' => 'required|digits:10'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->first('mobile')) {
                return ApiRes::failed($errors->first('mobile'));
            }
        }

        $user = User::Where('mobile', $req->mobile)->first();

        if ($user == null) {
            $otp = mt_rand(1000, 9999);
            $sms = new SmsController();
            $sms->mobile($req->mobile);
            $sms->message($otp);
            $sms->message_type("LOGIN_OTP");
            $status =  $sms->send();
            if ($status) {
                $uid =  mt_rand(100000000, 999999999);
                $user = new User();
                $user->uid = $uid;
                $user->mobile = $req->mobile;
                $user->otp = $otp;
                $status = $user->save();
                $user = new Userdetail();
                $user->uid = $uid;
                $user->mobile = $req->mobile;
                $user->birth_date = "0000-00-00";
                $user->birth_time = "00:00 AM";
                $status = $user->save();

                if ($status) {
                    return ApiRes::success("OTP Sent Successfully !");
                } else {
                    return ApiRes::error();
                }
            }
        } else {
            $user = User::Where('mobile', $req->mobile)->first();
            $otp = mt_rand(1000, 9999);
            $sms = new SmsController();
            $sms->mobile($req->mobile);
            $sms->message($otp);
            $sms->message_type("LOGIN_OTP");
            $status =  $sms->send();
            $user->otp = $otp;
            $status = $user->update();
            if ($status) {
                return ApiRes::success("OTP Sent Successfully !");
            } else {
                return ApiRes::error();
            }
        }
    }

    public function verifyOtp(Request $req)
    {

        $user = User::where('mobile', $req->mobile)->first();
        if ($user->otp == $req->otp) {
            $token = $user->createToken($user->mobile)->plainTextToken;
            $user->status = "verified";
            $status = $user->update();
            $details = Userdetail::where('mobile', $req->mobile)->first();
            $details->status = "1";
            $status = $details->update();
            if ($status) {
                return ApiRes::rlMsg("Login Successfully !", $token);
            } else {
                return ApiRes::error();
            }
        } else {
            return ApiRes::failed("OTP didn't Matched !");
        }
    }
    public function logout(Request $req)
    {
        $status =  $req->user()->currentAccessToken()->delete();
        if ($status) {
            return  ApiRes::logout();
        } else {
            return ApiRes::error();
        }
    }
    public function data()
    {
        $astro = Userdetail::where('uid', auth()->user()->uid)->get();
        return ApiRes::data('User Details', $astro);
    }

    public function imgUpload(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'image' => 'required|mimes:jpeg,jpg'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->first('image')) {
                return ApiRes::failed($errors->first('image'));
            }
        }
        try {
            if ($req->hasFile('image')) {
                $name =  uniqid() . ".webp";
                $path = 'assets/img/userprofile/';


                $user = Userdetail::where('uid', auth()->user()->uid)->first();
                if ($user->image != null) {
                    unlink($path . $user->image);
                }
                Image::make($req->image->getRealPath())->resize('200', '200')->save($path . $name);
                $user->image = $name;
                $status =  $user->update();
                if ($status) {
                    return ApiRes::success("Image Uploaded Successfully !");
                } else {
                    return ApiRes::error();
                }
            }
        } catch (\Throwable $th) {
            return ApiRes::failed($th);
        }
    }

    public function payment_history(Request $req)
    {
        $uid = auth()->user()->uid;
        $user = Userdetail::where('uid', $uid)->first();
        $payments = Payment::where('uid',$uid)->orderBy('id','DESC')->take(50)->get();
        return ApiRes::data('Payment History', ['user' => $user, 'payments' => $payments]);
    }

    public function recharge_page(Request $req)
    {
        $uid = auth()->user()->uid;
        $user = Userdetail::where('uid', $uid)->first();
        $recharge = Plan::orderBy('amount','ASC')->get();
        // $recharge = [50,100,200,300,500,1000,2000,3000,4000,8000,15000,20000,50000,100000];
        return ApiRes::data('Recharge Page', ['user' => $user, 'recharge' => $recharge]);
    }
}

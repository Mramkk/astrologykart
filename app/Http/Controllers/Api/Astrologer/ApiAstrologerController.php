<?php

namespace App\Http\Controllers\Api\Astrologer;

use App\Helpers\ApiRes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SmsController;
use App\Models\Astrologer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ApiAstrologerController extends Controller
{

    public function list(Request $req)
    {
        if ($req->id == null || $req->id == "") {

            $data = Astrologer::latest()->limit(6)->get();

            if ($data) {
                return ApiRes::data("Astrologer List", $data);
            } else {
                return ApiRes::error();
            }
        } else {
            $astro = Astrologer::latest()
                ->where('id', '<', $req->id)
                ->limit(6)
                ->get();
            if ($astro) {
                return ApiRes::data("Astrologer List", $astro);
            } else {
                return ApiRes::error();
            }
        }
    }

    public function register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:255',
            'about' => 'required|string',
            'email' => 'required|email|unique:astrologers|max:255',
            'mobile' => 'required|digits:10|unique:astrologers',
            'dob' => 'required|date_format:Y-m-d|before:today',
            'gander' => 'required|in:Male,Female',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'skills' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'experience' => 'required|numeric',
            'chat_price' => 'required|numeric',
            'call_price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->first('name')) {
                return ApiRes::failed($errors->first('name'));
            } elseif ($errors->first('about')) {
                return ApiRes::failed($errors->first('about'));
            } elseif ($errors->first('email')) {
                return ApiRes::failed($errors->first('email'));
            } elseif ($errors->first('mobile')) {
                return ApiRes::failed($errors->first('mobile'));
            } elseif ($errors->first('dob')) {
                return ApiRes::failed($errors->first('dob'));
            } elseif ($errors->first('gender')) {
                return ApiRes::failed($errors->first('gender'));
            } elseif ($errors->first('country')) {
                return ApiRes::failed($errors->first('country'));
            } elseif ($errors->first('state')) {
                return ApiRes::failed($errors->first('state'));
            } elseif ($errors->first('city')) {
                return ApiRes::failed($errors->first('city'));
            } elseif ($errors->first('skills')) {
                return ApiRes::failed($errors->first('skills'));
            } elseif ($errors->first('language')) {
                return ApiRes::failed($errors->first('language'));
            } elseif ($errors->first('experience')) {
                return ApiRes::failed($errors->first('experience'));
            } elseif ($errors->first('chat_price')) {
                return ApiRes::failed($errors->first('chat_price'));
            } elseif ($errors->first('call_price')) {
                return ApiRes::failed($errors->first('call_price'));
            }
        }

        $max = Astrologer::max('serial_no') + 1;
        $maxId = Astrologer::max('id') + 1;
        $astrologer = new Astrologer();
        $astrologer->name = $req->name;
        $astrologer->slug = Str::slug($req->name . " " . $maxId);
        $astrologer->about = $req->about;
        $astrologer->email = $req->email;
        $astrologer->mobile = $req->mobile;
        $astrologer->dob = $req->dob;
        $astrologer->gender = $req->gender;
        $astrologer->country = $req->country;
        $astrologer->state = $req->state;
        $astrologer->city = $req->city;
        $astrologer->skills = $req->skills;
        $astrologer->language = $req->language;
        $astrologer->experience = $req->experience;
        $astrologer->chat_price = $req->chat_price;
        $astrologer->call_price = $req->call_price;
        $astrologer->serial_no = $max;
        $status = $astrologer->save();
        if ($status) {
            return ApiRes::success("You Register Successfully !");
        } else {
            return ApiRes::error();
        }
    }

    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:255',
            'about' => 'required|string',
            'dob' => 'required|date_format:Y-m-d|before:today',
            'gander' => 'required|in:Male,Female',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'skills' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'experience' => 'required|numeric',
            'chat_price' => 'required|numeric',
            'call_price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->first('name')) {
                return ApiRes::failed($errors->first('name'));
            } elseif ($errors->first('about')) {
                return ApiRes::failed($errors->first('about'));
            } elseif ($errors->first('dob')) {
                return ApiRes::failed($errors->first('dob'));
            } elseif ($errors->first('gender')) {
                return ApiRes::failed($errors->first('gender'));
            } elseif ($errors->first('country')) {
                return ApiRes::failed($errors->first('country'));
            } elseif ($errors->first('state')) {
                return ApiRes::failed($errors->first('state'));
            } elseif ($errors->first('city')) {
                return ApiRes::failed($errors->first('city'));
            } elseif ($errors->first('skills')) {
                return ApiRes::failed($errors->first('skills'));
            } elseif ($errors->first('language')) {
                return ApiRes::failed($errors->first('language'));
            } elseif ($errors->first('experience')) {
                return ApiRes::failed($errors->first('experience'));
            } elseif ($errors->first('chat_price')) {
                return ApiRes::failed($errors->first('chat_price'));
            } elseif ($errors->first('call_price')) {
                return ApiRes::failed($errors->first('call_price'));
            }
        }


        $astrologer = Astrologer::where('id', auth()->user()->id)->first();
        $astrologer->name = $req->name;
        $astrologer->slug = Str::slug($req->name . " " . auth()->user()->id);
        $astrologer->about = $req->about;
        $astrologer->dob = $req->dob;
        $astrologer->gender = $req->gender;
        $astrologer->country = $req->country;
        $astrologer->state = $req->state;
        $astrologer->city = $req->city;
        $astrologer->skills = $req->skills;
        $astrologer->language = $req->language;
        $astrologer->experience = $req->experience;
        $astrologer->chat_price = $req->chat_price;
        $astrologer->call_price = $req->call_price;
        $status = $astrologer->update();
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


        $astro = Astrologer::where('mobile', $req->mobile)->first();
        if ($astro != null) {
            $otp = mt_rand(1000, 9999);
            $sms = new SmsController();
            $sms->mobile($req->mobile);
            $sms->message($otp);
            $sms->message_type("LOGIN_OTP");
            $status =  $sms->send();
            if ($status) {
                $astro->otp = $otp;
                $status = $astro->update();
                if ($status) {
                    return ApiRes::success("OTP Sent Successfully !");
                } else {
                    return ApiRes::error();
                }
            } else {
                return ApiRes::error();
            }
        } else {
            return ApiRes::failed("You Account not Found. Please Sign Up.");
        }
    }

    public function verifyOtp(Request $req)
    {

        $astro = Astrologer::where('mobile', $req->mobile)->first();
        if ($astro->otp == $req->otp) {
            $token = $astro->createToken($astro->mobile)->plainTextToken;
            if ($token) {
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
        $astro = Astrologer::where('id', auth()->user()->id)->get();
        return ApiRes::data('Astrologer Details', $astro);
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
                $path = 'assets/img/astrologer/';
                $astro = Astrologer::where('id', auth()->user()->id)->first();
                if ($astro->image != null) {
                    unlink($path . $astro->image);
                }
                Image::make($req->image->getRealPath())->resize('200', '200')->save($path . $name);
                $astro->image = $name;
                $status =  $astro->save();
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

    // public function sms($mobile, $otp)
    // {


    //     $profile_id = 104913;
    //     $entity_id = 1701163048507202808;
    //     $template_id = 1707163133436854489;
    //     $api_key = '010w43ls0c0jGSIqk7aF';
    //     $sender_id = 'ASTRKT';
    //     $message_txt = 'Verify your mobile number on Astrology Kart with OTP. ' . $otp . ' ASTRKT';
    //     Http::get('http://nimbusit.info/api/pushsms.php?user=' . $profile_id . '&key=' . $api_key . '&sender=' . $sender_id . '&mobile=' . $mobile . '&text=' . $message_txt . '&templateid=' . $template_id . '&entityid=' . $entity_id);
    //     $status = true;
    //     if ($status) {
    //         $astro = Astrologer::where('mobile', $mobile)->first();
    //         $astro->otp = $otp;
    //         $status = $astro->update();
    //         if ($status) {
    //             return ApiRes::success("OTP Sent Successfully !");
    //         } else {
    //             return ApiRes::error();
    //         }
    //     } else {
    //         return ApiRes::error();
    //     }
    // }
}

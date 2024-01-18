<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Userdetail;
use App\Models\UserQuery;
use App\Models\Astrologer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserQueryController extends Controller
{
    public function getInTouch(Request $req)
    {
        
        $validator = $req->validate([
            'g-recaptcha-response' => 'required',
        ]);
        
        
        
        $fullname = $req->firstname . ' ' . $req->lastname;
        $data = new UserQuery();
        $data->fullname = $fullname;
        $data->mobile = $req->mobile;
        $data->email = $req->email;
        $data->message = $req->message;
        $data->save();
        return redirect('/')->with('status', 'Query Form Submitted Successfully!');
    }
    
    
    public function callForm(Request $req,$id)
    {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        $asrologer=Astrologer::where('id',$id)->first();
        if((float)$asrologer->call_price>(float)$user->balance){
            return redirect()->route('recharge.page');
        }
        return view('web.call-form', compact('user'));
    }

    public function chatForm(Request $req,$id)
    {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        $asrologer=Astrologer::where('id',$id)->first();
        if((float)$asrologer->chat_price>(float)$user->balance){
            return redirect()->route('recharge.page');
        }
        return view('web.chat-form', compact('user'));
    }
}

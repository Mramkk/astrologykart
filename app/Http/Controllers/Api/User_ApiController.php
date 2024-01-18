<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\EasyData;
use App\Helpers\Classes\EasyImage;
use App\Models\Userdetail;
use App\Models\User;
use Illuminate\Support\Str;

class User_ApiController extends Controller
{
    public $dir_name = 'userprofile';
    public $msg_txt = 'User details';

    public function index(Request $request)
    {
        if ($request->action == 'GET') {
            $x = new EasyData;
            $x->status(true);
            $x->message($this->msg_txt);
            $data = Userdetail::where('uid', auth()->user()->uid)->first();
            return $x->json_output(['data' => $data]);
        }
        $ob = new EasyData;
        $ob->message('Invalid action type');
        return $ob->json_output();
    }

    public function store(Request $request)
    {
        if ($request->action == 'UPDATE') {

            $x = new EasyData;
            $x->request = $request;
            $data = '';

            // Check User details available or not
            $x->model = Userdetail::where('uid', auth()->user()->uid)->first();
            if (empty($x->model)) {
                $x->model = new Userdetail;
                $check_email = Userdetail::where('email', $request->email)->first();
            } else {
                $check_email = Userdetail::where('id', '!=', $x->model->id)->where('email', $request->email)->first();
            }

            $x->datax('uid', $x->uid());
            $x->data('name', 'name', 'required|string|max:30');
            $x->data('birth_date', 'birth_date', 'nullable|string|max:50');
            $x->data('birth_time', 'birth_time', 'nullable|string|max:50');
            $x->data('birth_place', 'birth_place', 'nullable|string|max:200');
            $x->data('gender', 'gender', 'nullable|string');
            $x->datax('mobile', auth()->user()->mobile);
            $x->data('email', 'email', 'nullable|email|string|max:200');
            $x->data('city', 'city', 'nullable|string|max:50');
            $x->data('state', 'state', 'nullable|string|max:100');
            $x->data('pincode', 'pincode', 'nullable|numeric|digits:6');

            // if (!empty($request->email)) {
                if (empty($check_email)) {
                    if ($x->save()) {
                        $user = User::find(auth()->user()->id);
                        if (!empty($user)) {
                            $user->name = $request->name;
                            $user->email = $request->email;
                            $user->save();
                        }
                        $x->status(true);
                        $x->message($this->msg_txt . ' updated');
                    }
                } else {
                    $x->message('Email already registered.');
                }
            // }else{
            //     $x->message('Email filed is required.');
            // }

            $output_data = Userdetail::where('uid', auth()->user()->uid)->first();

            return $x->json_output(['data' => $output_data]);
        }

        if ($request->action == 'UPDATE_PRO_IMG') {
            $x = new EasyData;
            $x->request = $request;
            $x->model = $u = Userdetail::where('uid', auth()->user()->uid)->first();
            $data = '';
            if (!empty($x->model)) {
                if (!empty($request->image)) {
                    $image_name = Str::of($u->name)->slug('-') . time() . $u->id;
                    $image = EasyImage::image($request, 'image')
                        ->model('userdetails', 'image', $u->id)
                        ->path('assets/img/userprofile/')
                        ->crop(200, 200)
                        ->name($image_name)
                        ->save();
                    if ($image->status != false) {
                        $x->status(true);
                        $x->message('Profile Image Updated Successfully');
                    } else {
                        $x->message($image->message);
                    }
                } else {
                    $x->message('Image required..!');
                }
            } else {
                $x->message('First Update Username.');
            }
            return $x->json_output();
        }

        $ob = new EasyData;
        $ob->message('Invalid action type');
        return $ob->json_output();
    }
}

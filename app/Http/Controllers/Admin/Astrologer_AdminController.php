<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\EasyData;
use App\Helpers\Classes\EasyImage;
use App\Models\Astrologer;
use Illuminate\Support\Str;
use App\Http\Controllers\States;

class Astrologer_AdminController extends Controller
{
    // ======== Settings ===========

    public $image_width = 300;
    public $image_height = 300;

    public $image_dir = 'assets/img/astrologer/';
    public $view_dir = 'admin.astrologer.';
    public $msg_txt = 'Astrologer';
    public $table_name = 'astrologers';

    // ======== End Settings ===========

    public function index(Request $request)
    {
        $data_list = '';
        if(!empty($request->q)){
            $search = $request->q;
            $data_list = Astrologer::where('name','LIKE','%'.$search.'%')->orWhere('created_at','LIKE','%'. date('Y-m-d', strtotime($search)) .'%');
        }else{
            $data_list = Astrologer::orderBy('serial_no','ASC');
        }
        $data_list = $data_list->paginate(50);
        return view($this->view_dir.'index',compact('data_list'));
    }

    public function create()
    {
        $states = States::list();
        $img_wh = $this->image_width.'x'.$this->image_height;
        return view($this->view_dir.'create',compact('states','img_wh'));
    }

    public function store(Request $request)
    {
        if($request->action == 'CREATE'){
            $x = new EasyData;
            $x->request = $request;
            $x->model = new Astrologer;
            $x->data('name','name','required|string|max:255');
            $x->data('email','email','required|string|email|max:255|unique:astrologers,email');
            $x->data('mobile','mobile','required|numeric|digits:10|unique:astrologers,mobile');
            $x->data('dob','dob','required|date_format:Y-m-d|before:today');
            $x->data('about','about','nullable|string|max:255');
            $x->data('state','state','required|string|max:255');
            $x->data('skills','skills','required|string|max:255');
            $x->data('language','language','required|string|max:255');
            $x->data('experience','experience','required|string|max:255');
            $x->data('chat_price','chat_price','required|integer');
            $x->data('call_price','call_price','required|integer');
            $x->vdata('image','nullable|image|mimes:jpg,jpeg,png');
            $x->data('status','status','required|numeric');
            if($x->save()){

                $name_slug = Str::of($request->name)->slug('-').'-'.$x->saved_id;
                $image_name = $name_slug.rand(1000,9999);
                $slugx = Astrologer::find($x->saved_id);
                $slugx->slug = $name_slug;
                $slugx->save();

                if(!empty($request->image)){
                    EasyImage::image($request, 'image')
                        ->model($this->table_name, 'image', $x->saved_id)
                        ->path($this->image_dir)
                        ->crop($this->image_width, $this->image_height)
                        ->name($image_name)
                        ->save();
                }

                $x->status(true);
                $x->message($this->msg_txt.' Created Successfully');
            }
            return $x->json_output();
        }


        if($request->action == 'UPDATE'){
            $x = new EasyData;
            $x->request = $request;
            $x->model = Astrologer::find($request->id);
            if(!empty($x->model)){
                $x->data('name','name','required|string|max:255');
                $x->data('about','about','nullable|string|max:255');
                $x->data('email','email','required|string|email|max:255|unique:astrologers,email,'.$request->id);
                $x->data('mobile','mobile','required|numeric|digits:10|unique:astrologers,mobile,'.$request->id);
                $x->data('state','state','required|string|max:255');
                $x->data('skills','skills','required|string|max:255');
                $x->data('language','language','required|string|max:255');
                $x->data('experience','experience','required|string|max:255');
                $x->data('chat_price','chat_price','required|integer');
                $x->data('call_price','call_price','required|integer');
                $x->vdata('image','nullable|image|mimes:jpg,jpeg,png');
                $x->data('status','status','required|numeric');
                if($x->save()){

                    $name_slug = Str::of($request->name)->slug('-').'-'.$x->saved_id;
                    $image_name = $name_slug.rand(1000,9999);
                    $slugx = Astrologer::find($x->saved_id);
                    $slugx->slug = $name_slug;
                    $slugx->save();

                    if(!empty($request->image)){
                        EasyImage::image($request, 'image')
                            ->model($this->table_name, 'image', $x->saved_id)
                            ->path($this->image_dir)
                            ->crop($this->image_width, $this->image_height)
                            ->name($image_name)
                            ->save();
                    }

                    $x->status(true);
                    $x->message($this->msg_txt.' Updated Successfully');
                }
            }else{
                $x->message('Something Error...!');
            }
            return $x->json_output();
        }

        // Update Status / Delete a Record / Delete Image / Reorder Data
        $master = new Master_AdminController;
        $master->table_name = $this->table_name;
        $master->image_dir = $this->image_dir;
        $master_req = $master->masterRequest($request);
        if($master_req != false){
            return $master_req;
        }

        $ob = new EasyData;
        $ob->message('Invalid action type');
        return $ob->json_output();
    }

    public function edit($id)
    {
        $states = States::list();
        $img_wh = $this->image_width.'x'.$this->image_height;
        $data = Astrologer::find($id);
        if(!empty($data)){
            return view($this->view_dir.'edit',compact('data','states','img_wh'));
        }else{
            return abort('403','Id Not Found');
        }
    }

    public function re_order($id,$serial_no){
        $data = Astrologer::find($id);
        if(!empty($data) and $serial_no > 0){
            $data->serial_no = $serial_no;
            if($data->save()){
                $list = Astrologer::where('id','!=',$data->id)->orderBy('serial_no','ASC')->get();
                if($list->count() > 0){
                    $i = 1;
                    foreach($list as $data){
                        $i = $i == $serial_no ? $i+1 : $i;
                        $s = Astrologer::find($data->id);
                        $s->serial_no = $i;
                        $s->save();
                        $i = $i+1;
                    }
                }
            }
        }
    }
}

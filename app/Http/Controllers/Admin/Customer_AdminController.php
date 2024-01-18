<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\EasyData;
use App\Models\Userdetail;
use App\Models\User;
use App\Http\Controllers\Admin\Master_AdminController;


class Customer_AdminController extends Controller
{

    // ======== Settings ===========
    public $image_width = 0;
    public $image_height = 0;
    public $image_dir = 'assets/img/userprofile/';
    public $view_dir = 'admin.customer.';
    public $msg_txt = 'Customer';
    public $table_name = 'userdetails';
    // ======== End Settings ===========

    public function index(Request $request)
    {
        $data_list = Userdetail::orderBy('id','DESC');
        if(!empty($request->q)){
            $search = $request->q;
            $data_list->where(function($query) use ($search){
                $query->where('name','LIKE','%'.$search.'%');
                $query->orWhere('email','LIKE','%'.$search.'%');
                $query->orWhere('mobile','LIKE','%'.$search.'%');
                $query->orWhere('created_at','LIKE','%'. date('Y-m-d', strtotime($search)) .'%');
            });
        }
        $data_list = $data_list->paginate(50);
        return view($this->view_dir.'index',compact('data_list'));
    }


    public function store(Request $request)
    {

        $master = new Master_AdminController;
        $master->table_name = $this->table_name;
        $master->msg_prefix = 'Customer';
        $master->image_dir = $this->image_dir;
        $master_req = $master->masterRequest($request);
        if($master_req != false){
            return $master_req;
        }

        $ob = new EasyData;
        $ob->message('Invalid action type');
        return $ob->json_output();

    }

    public function show($id)
    {
        $data = Userdetail::find($id);
        if(!empty($data)){
            return view($this->view_dir.'show',compact('data'));
        }else{
            return abort('403','Id Not Found');
        }
    }

}

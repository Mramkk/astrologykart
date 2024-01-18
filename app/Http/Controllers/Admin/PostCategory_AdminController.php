<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\EasyData;
use App\Helpers\Classes\EasyImage;
use App\Models\PostCategory;
use Illuminate\Support\Str;

class PostCategory_AdminController extends Controller
{
    // ======== Settings ===========
    public $image_width = 170;
    public $image_height = 170;
    public $image_dir = 'assets/img/post-category/';
    public $view_dir = 'admin.post-category.';
    public $table_name = 'post_categories';
    public $msg_txt = 'Category';
    // ======== End Settings ===========


    public function index(Request $request)
    {
        $data_list = '';
        if (!empty($request->q)) {
            $search = $request->q;
            $data_list = PostCategory::where('name', 'LIKE', '%' . $search . '%');
        } else {
            $data_list = PostCategory::orderBy('id', 'DESC');
        }
        $data_list = $data_list->paginate(50);
        return view($this->view_dir . 'index', compact('data_list'));
    }

    public function create()
    {
        $img_wh = $this->image_width.'x'.$this->image_height;
        return view($this->view_dir.'create',compact('img_wh'));
    }

    public function store(Request $request)
    {
        if ($request->action == 'CREATE') {
            $x = new EasyData;
            $x->request = $request;
            $x->model = new PostCategory;
            $x->data('name', 'name', 'required|string|max:255|unique:post_categories,name');
            $x->datax('slug', Str::of($request->name)->slug('-'));
            $x->data('description', 'description', 'required|string|max:255');
            $x->vdata('image','nullable|image|mimes:jpg,jpeg,png');
            $x->data('status', 'status', 'required|numeric');
            if ($x->save()) {
                if (!empty($request->image)) {
                    $image_name = $request->name.'_'.time();
                    EasyImage::image($request, 'image')
                        ->model($this->table_name, 'image', $x->saved_id)
                        ->path($this->image_dir)
                        ->crop($this->image_width, $this->image_height)
                        ->name($image_name)
                        ->save();
                }
                $x->status(true);
                $x->message('Category Added Successfully');
            }
            return $x->json_output();
        }


        if ($request->action == 'UPDATE') {
            $x = new EasyData;
            $x->request = $request;
            $x->model = PostCategory::find($request->id);
            if (!empty($x->model)) {
                $x->data('name', 'name', 'required|string|max:255|unique:categories,name,' . $request->id);
                $x->datax('slug', Str::of($request->name)->slug('-'));
                $x->data('description', 'description', 'required|string|max:255');
                $x->vdata('image','nullable|image|mimes:jpg,jpeg,png');
                $x->data('status', 'status', 'required|numeric');
                if ($x->save()) {
                    if (!empty($request->image)) {
                        $image_name = $request->name.'_'.time();
                        EasyImage::image($request, 'image')
                            ->model($this->table_name, 'image', $x->saved_id)
                            ->path($this->image_dir)
                            ->crop($this->image_width, $this->image_height)
                            ->name($image_name)
                            ->save();
                    }
                    $x->status(true);
                    $x->message('Category Updated Successfully');
                }
            } else {
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
        $img_wh = $this->image_width.'x'.$this->image_height;
        $data = PostCategory::find($id);
        if (!empty($data)) {
            return view('admin.post-category.edit', compact('data'));
        } else {
            return abort('403', 'Id Not Found');
        }
    }
}

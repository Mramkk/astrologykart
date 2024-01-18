<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\EasyData;
use App\Helpers\Classes\EasyImage;
use App\Models\Page;
use Illuminate\Support\Str;

class Page_AdminController extends Controller
{
    // ======== Settings ===========

    // public $image_width = 650;
    // public $image_height = 350;
    // public $thumb_width = 370;
    // public $thumb_height = 199;
    // public $image_dir = 'assets/img/post/';
    public $view_dir = 'admin.page.';
    public $msg_txt = 'Page';
    public $table_name = 'pages';

    // ======== End Settings ===========


    public function index(Request $request)
    {
        $data_list = '';
        if (!empty($request->q)) {
            $search = $request->q;
            $data_list = Page::where('title', 'LIKE', '%' . $search . '%');
        } else {
            $data_list = Page::orderBy('id', 'DESC');
        }
        $data_list = $data_list->paginate(50);
        return view($this->view_dir . 'index', compact('data_list'));
    }

    public function create()
    {
        return view($this->view_dir . 'create');
    }

    public function store(Request $request)
    {
        if ($request->action == 'CREATE') {
            $x = new EasyData;
            $x->request = $request;
            $x->model = new Page;
            $x->data('title', 'title', 'required|string|max:255|unique:posts,title');
            $x->datax('slug', Str::of($request->title)->slug('-'));
            $x->data('content', 'content', 'required');
            $x->data('meta_title', 'meta_title', 'nullable|string|max:255');
            $x->data('meta_description', 'meta_description', 'nullable|string|max:255');
            $x->data('meta_keywords', 'meta_keywords', 'nullable|string|max:255');
            if ($x->save()) {
                $x->status(true);
                $x->message($this->msg_txt . ' Created Successfully');
            }
            return $x->json_output();
        }


        if ($request->action == 'UPDATE') {
            $x = new EasyData;
            $x->request = $request;
            $x->model = Page::find($request->id);
            if (!empty($x->model)) {
                $x->data('title', 'title', 'required|string|max:255|unique:posts,title,' . $request->id);
                $x->datax('slug', Str::of($request->title)->slug('-'));
                $x->data('content', 'content', 'required');
                $x->data('meta_title', 'meta_title', 'nullable|string|max:255');
                $x->data('meta_description', 'meta_description', 'nullable|string|max:255');
                $x->data('meta_keywords', 'meta_keywords', 'nullable|string|max:255');
                if ($x->save()) {
                    $x->status(true);
                    $x->message($this->msg_txt . ' Updated Successfully');
                }
            } else {
                $x->message('Something Error...!');
            }
            return $x->json_output();
        }

        $master = new Master_AdminController;
        $master->table_name = $this->table_name;
        $master_req = $master->masterRequest($request);
        if ($master_req != false) {
            return $master_req;
        }

        $ob = new EasyData;
        $ob->message('Invalid action type');
        return $ob->json_output();
    }

    public function edit($id)
    {
        $data = Page::find($id);
        if (!empty($data)) {
            return view($this->view_dir . 'edit', compact('data'));
        } else {
            return abort('403', 'Id Not Found');
        }
    }
}

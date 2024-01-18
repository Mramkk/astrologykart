<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\EasyData;
use App\Helpers\Classes\EasyImage;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Str;
use App\Models\PostBlock;

class Post_AdminController extends Controller
{
    // ======== Settings ===========

    public $image_width = 650;
    public $image_height = 350;
    public $thumb_width = 370;
    public $thumb_height = 199;
    public $image_dir = 'assets/img/post/';
    public $view_dir = 'admin.post.';
    public $msg_txt = 'Post';
    public $table_name = 'posts';

    // ======== End Settings ===========


    public function index(Request $request)
    {
        $data_list = '';
        if (!empty($request->q)) {
            $search = $request->q;
            $data_list = Post::where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('category', 'LIKE', '%' . $search . '%');
        } else {
            $data_list = Post::orderBy('id', 'DESC');
        }
        $data_list = $data_list->paginate(50);
        return view($this->view_dir . 'index', compact('data_list'));
    }

    public function create()
    {
        $postx = PostBlock::where('is_inserted', false)->orderBy('id', 'DESC')->first();
        $img_wh = $this->image_width . 'x' . $this->image_height;
        $categories = PostCategory::all();
        return view($this->view_dir . 'create', compact('categories', 'img_wh','postx'));
    }

    public function store(Request $request)
    {
        if ($request->action == 'CREATE') {
            $x = new EasyData;
            $x->request = $request;
            $x->model = new Post;
            $x->data('title', 'title', 'required|string|max:255|unique:posts,title');
            $x->datax('slug', Str::of($request->title)->slug('-'));
            $x->data('content', 'content', 'required');
            $x->data('meta_title', 'meta_title', 'nullable|string|max:255');
            $x->data('meta_description', 'meta_description', 'nullable|string|max:255');
            $x->data('meta_keywords', 'meta_keywords', 'nullable|string|max:255');
            $x->data('author_name', 'author_name', 'nullable|string|max:255');
            $x->data('category', 'category', 'required|string');
            $x->data('status', 'status', 'required|numeric');
            $x->vdata('image', 'nullable|image|mimes:jpeg,jpg,png');
            if ($x->save()) {
                $image_name = Str::of($request->title)->slug('-') . '_' . rand() . $x->saved_id;
                if (!empty($request->image)) {

                    EasyImage::image($request, 'image')
                        ->model($this->table_name, 'image', $x->saved_id)
                        ->path($this->image_dir)
                        ->crop($this->image_width, $this->image_height)
                        ->name($image_name)
                        ->save();

                    EasyImage::image_path($this->image_dir . $image_name . '.jpg')
                        ->path($this->image_dir . 'thumbnail/')
                        ->name($image_name)
                        ->resize($this->thumb_width, $this->thumb_height)
                        ->save();
                }

                if (!empty($request->post_block_id)) {
                    $pb = PostBlock::find($request->post_block_id);
                    if (!empty($pb)) {
                        $pb->is_inserted = 1;
                        $pb->save();
                    }
                }

                $x->status(true);
                $x->message($this->msg_txt . ' Created Successfully');
            }
            return $x->json_output();
        }


        if ($request->action == 'UPDATE') {
            $x = new EasyData;
            $x->request = $request;
            $x->model = Post::find($request->id);
            if (!empty($x->model)) {
                $x->data('title', 'title', 'required|string|max:255|unique:posts,title,' . $request->id);
                $x->datax('slug', Str::of($request->title)->slug('-'));
                $x->data('content', 'content', 'required');
                $x->data('meta_title', 'meta_title', 'nullable|string|max:255');
                $x->data('meta_description', 'meta_description', 'nullable|string|max:255');
                $x->data('meta_keywords', 'meta_keywords', 'nullable|string|max:255');
                $x->data('author_name', 'author_name', 'nullable|string|max:255');
                $x->data('category', 'category', 'required|string');
                $x->data('status', 'status', 'required|numeric');
                $x->vdata('image', 'nullable|image|mimes:jpeg,jpg,png');
                if ($x->save()) {
                    $image_name = Str::of($request->title)->slug('-') . '_' . rand() . $x->saved_id;
                    if (!empty($request->image)) {

                        EasyImage::image($request, 'image')
                            ->model($this->table_name, 'image', $x->saved_id)
                            ->path($this->image_dir)
                            ->crop($this->image_width, $this->image_height)
                            ->name($image_name)
                            ->save();

                        EasyImage::image_path($this->image_dir . $image_name . '.jpg')
                            ->path($this->image_dir . 'thumbnail/')
                            ->name($image_name)
                            ->resize($this->thumb_width, $this->thumb_height)
                            ->save();
                    }
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
        $master->image_dir = $this->image_dir;
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
        $img_wh = $this->image_width . 'x' . $this->image_height;
        $data = Post::find($id);
        $categories = PostCategory::all();
        if (!empty($data)) {
            return view($this->view_dir . 'edit', compact('data', 'categories', 'img_wh'));
        } else {
            return abort('403', 'Id Not Found');
        }
    }
}

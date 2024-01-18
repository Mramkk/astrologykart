<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\EasyData;
use App\Helpers\Classes\EasyImage;
use App\Models\Slider;
use Illuminate\Support\Str;

class Slider_AdminController extends Controller
{
    // ======== Settings ===========

    public $image_width = 650;
    public $image_height = 350;
    public $thumb_width = 370;
    public $thumb_height = 199;

    public $image_dir = 'assets/img/slider/';
    public $view_dir = 'admin.slider.';
    public $table_name = 'sliders';
    public $msg_txt = 'Slider';

    // ======== End Settings ===========

    public function index(Request $request)
    {
        $data_list = '';
        if (!empty($request->q)) {
            $search = $request->q;
            $data_list = Slider::where('slider_name', 'LIKE', '%' . $search . '%')
                ->orWhere('title', 'LIKE', '%' . $search . '%');
        } else {
            $data_list = Slider::orderBy('serial_no', 'ASC');
        }
        $data_list = $data_list->paginate(50);
        return view($this->view_dir . 'index', compact('data_list'));
    }


    public function create()
    {
        $img_wh = $this->image_width.'x'.$this->image_height;
        return view($this->view_dir . 'create',compact('img_wh'));
    }

    public function store(Request $request)
    {
        if ($request->action == 'CREATE') {
            $x = new EasyData;
            $x->request = $request;
            $x->model = new Slider;
            $x->data('slider_name', 'slider_name', 'required|string|max:255');
            $x->data('title', 'title', 'required|string|max:255');
            $x->data('description', 'description', 'required|string|max:255');
            $x->data('button_name', 'button_name', 'required|string|max:255');
            $x->data('button_link', 'button_link', 'nullable|string|max:255');
            $x->data('serial_no', 'serial_no', 'nullable|numeric');
            $x->data('status', 'status', 'required|numeric');
            if ($x->save()) {
                if (!empty($request->image)) {
                    $image_name = Str::of($request->title)->slug('-') . '_' . $x->saved_id;
                    EasyImage::image($request, 'image')
                        ->model($this->table_name, 'image', $x->saved_id)
                        ->path($this->image_dir)
                        ->crop($this->image_width, $this->image_height)
                        ->name($image_name)
                        ->save();
                    // Generate Thumbnail
                    EasyImage::image_path($this->image_dir . $image_name . '.jpg')
                        ->path($this->image_dir . 'thumbnail/')
                        ->name($image_name)
                        ->resize($this->thumb_width, $this->thumb_height)
                        ->save();
                }
                $x->status(true);
                $x->message($this->msg_txt . ' Added Successfully');
            }
            return $x->json_output();
        }


        if ($request->action == 'UPDATE') {

            $x = new EasyData;
            $x->request = $request;
            $x->model = Slider::find($request->id);
            if (!empty($x->model)) {
                $x->data('slider_name', 'slider_name', 'required|string|max:255');
                $x->data('title', 'title', 'required|string|max:255');
                $x->data('description', 'description', 'required|string|max:255');
                $x->data('button_name', 'button_name', 'required|string|max:255');
                $x->data('button_link', 'button_link', 'nullable|string|max:255');
                $x->data('serial_no', 'serial_no', 'nullable|numeric');
                $x->data('status', 'status', 'required|numeric');
                if ($x->save()) {
                    if (!empty($request->image)) {
                        $image_name = Str::of($request->title)->slug('-') . '_' . $x->saved_id;
                        EasyImage::image($request, 'image')
                            ->model($this->table_name, 'image', $x->saved_id)
                            ->path($this->image_dir)
                            ->crop($this->image_width, $this->image_height)
                            ->name($image_name)
                            ->save();
                        // Generate Thumbnail
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

        // Update Status / Delete a Record / Delete Image / Reorder Data
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
        $img_wh = $this->image_width.'x'.$this->image_height;
        $data = Slider::find($id);
        if (!empty($data)) {
            return view($this->view_dir . 'edit', compact('data','img_wh'));
        } else {
            return abort('403', 'Id Not Found');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\EasyData;
use App\Helpers\Classes\EasyImage;
use App\Models\Slider;
use Hpx;

class MediaLibrary_AdminController extends Controller
{
    // ======== Settings ===========

    public $image_width = '';
    public $image_height = '';
    public $dir_name = 'assets/media-library/';
    public $msg_txt = 'Image';

    // ======== End Settings =======
    public function index(Request $request)
    {
        // $data_list = '';
        // if(!empty($request->q)){
        //     $search = $request->q;
        //     $data_list = Slider::where('slider_name','LIKE','%'.$search.'%')
        //         ->orWhere('title','LIKE','%'.$search.'%');
        // }else{ $data_list = Slider::orderBy('order_no','ASC'); }
        // $data_list = $data_list->paginate(50);
        // return view('admin.'.$this->dir_name.'.index',compact('data_list'));
    }


    public function store(Request $request)
    {
        if($request->action == 'GET_IMAGES'){
            $x = new EasyData;
            $x->request = $request;
            $x->vdata('next','nullable|numeric');
            $max = 24;
            $data = '';
            if($x->validate()){
                $dirname = $this->dir_name;
                $images = glob($dirname."*");
                usort( $images, function( $a, $b ) { return filemtime($b) - filemtime($a); } );
                $i = 1;
                $i2 = 0;
                foreach($images as $image) {
                    if($i > $request->next){
                        $data .= '<div class="col p-2 ml_img_box">
                                <div class="portfolio__items">
                                    <div class="portfolio__items--thumbnail position__relative">
                                        <img class="portfolio__items--thumbnail__img display-block" src="'.asset($image).'" alt="image">
                                        <div class="portfolio__view--icon">
                                            <span class="portfolio__view--icon__link">
                                                <a href="'.asset($image).'" target="_blank"><i class="icofont-external-link"></i></a>
                                            </span>
                                            <span class="portfolio__view--icon__link">
                                                <i class="icofont-ui-copy" onclick="CopyMediaUrl('."'".asset($image)."'".')"></i>
                                            </span>
                                            <span class="portfolio__view--icon__link">
                                                <i class="icofont-delete-alt" onclick="delMediaImg(this,'."'".basename($image)."'".')"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        $i2=$i2+1;
                    }
                   $i=$i+1;
                   if($i2 >= $max){ break; }
                }
                $x->status(true);
            }
            return $x->json_output(['data'=> $data]);
        }


        if($request->action == 'UPLOAD'){
            $x = new EasyData;
            $x->request = $request;
            $x->vdata('image','required|image|mimes:jpg,jpeg,png');
            $x->vdata('name','nullable|string');
            $image_name = '';
            if($x->validate()){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $name = str_replace('.'.$extension,'',$file->getClientOriginalName());
                $image_name = $name.'_'.time();
                if(!empty($request->name)){
                    $image_name = $request->name;
                }
                $upload_image = EasyImage::image($request,'image')
                        ->path($this->dir_name)
                        ->name($image_name)
                        ->ext('.'.$extension)
                        ->save();
                $image_name = $upload_image->name;
                $x->status(true);
                $x->message($this->msg_txt.' Uploaded Successfully');
            }
            return $x->json_output(['image'=> asset($image_name)]);
        }

        if($request->action == 'DELETE'){
            $x = new EasyData;
            $x->request = $request;
            $x->vdata('name','required|string');
            if($x->validate()){
                // ======== Delete Image =========
                $x->delete_file($this->dir_name,$request->name);
                // ======= End Delete Image ======
                $x->status(true);
                $x->message($this->msg_txt.' Deleted Successfully');
            }
            return $x->json_output();
        }

        $ob = new EasyData;
        $ob->message('Invalid action type');
        return $ob->json_output();
    }

}


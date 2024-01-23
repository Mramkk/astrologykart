<?php

namespace App\Http\Controllers\Api\Post;

use App\Helpers\ApiRes;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    public function data(Request $req)
    {
        // $data = Post::where('status', 1)->orderBy('id', 'desc')->paginate(5);
        // return ApiRes::data('All Post', $data);

        if ($req->id == null || $req->id == "") {

            $data = Post::latest()->limit(6)->get();

            if ($data) {
                return ApiRes::data("Datalist", $data);
            } else {
                return ApiRes::error();
            }
        } else {
            $astro = Post::latest()
                ->where('id', '<', $req->id)
                ->limit(6)
                ->get();
            if ($astro) {
                return ApiRes::data("Datalist", $astro);
            } else {
                return ApiRes::error();
            }
        }
    }

    public function dataByCategory(Request $req)
    {

        $data = Post::where('status', 1)->where('category', $req->category)->orderBy('id', 'desc')->limit(1)->get();
        return ApiRes::data('Category Post', $data);
    }
}

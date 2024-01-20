<?php

namespace App\Http\Controllers\Api\Post;

use App\Helpers\ApiRes;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    public function data()
    {
        $data = Post::where('status', 1)->orderBy('id', 'desc')->paginate(5);
        return ApiRes::data('All Post', $data);
    }

    public function dataByCategory(Request $req)
    {
<<<<<<< HEAD
        
        $data = Post::where('status', 1)->where('category', $req->category)->orderBy('id', 'desc')->limit(1)->get();
=======
        $data = Post::where('status', 1)->where('category', $req->category)->orderBy('id', 'desc')->limit(5)->get();
>>>>>>> 7eb17b309b83a632f5403eb52f34ea28e7e045e6
        return ApiRes::data('Category Post', $data);
    }
}

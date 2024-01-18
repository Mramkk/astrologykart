<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\EasyData;
use App\Http\Controllers\Admin\Astrologer_AdminController;

class Astrologer_WebController extends Controller
{
    public function register_astrologer(Request $request)
    {
        $request->merge(['status' => '0']);
        if($request->action == 'CREATE'){
            $astro = new Astrologer_AdminController;
            $data = $astro->store($request);
            return $data;
        }

        $ob = new EasyData;
        $ob->message('Invalid Action Type');
        return $ob->json_output();
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\EasyData;
use App\Models\Astrologer;
use App\Http\Controllers\Admin\Astrologer_AdminController;

class Astrologer_ApiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->action == 'GET') {
            $x = new EasyData;
            $x->status(true);
            $x->message('Astrologers List');
            $data = '';
            if(!empty($request->search)){
                $search = $request->search;
                $data = Astrologer::where('name','LIKE','%'.$search.'%');
            }else{
                $data = Astrologer::orderBy('id','DESC');
            }
            $data = $data->get();
            return $x->json_output(['data' => $data]);
        }

        $ob = new EasyData;
        $ob->message('Invalid action type');
        return $ob->json_output();
    }

    public function store(Request $request)
    {
        if($request->action == 'CREATE'){
            $astro = new Astrologer_AdminController;
            $data = $astro->store($request);
            return $data;
        }

        $ob = new EasyData;
        $ob->message('Invalid action type');
        return $ob->json_output();
    }

}

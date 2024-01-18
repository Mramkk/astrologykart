<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Userdetail;
use App\Models\UserQuery;
use Illuminate\Http\Request;

class UserQueriesController extends Controller
{
    public $view_dir = 'admin.query.';


    public function index(Request $request)
    {
        $data_list = UserQuery::orderBy('id', 'DESC');
        
        if (!empty($request->q)) {
            $search = $request->q;
            $data_list->where(function ($query) use ($search) {
                $query->where('fullname', 'LIKE', '%' . $search . '%');
                $query->orWhere('email', 'LIKE', '%' . $search . '%');
                $query->orWhere('mobile', 'LIKE', '%' . $search . '%');
                $query->orWhere('created_at', 'LIKE', '%' . date('Y-m-d', strtotime($search)) . '%');
            });
        }
        $data_list = $data_list->paginate(50);
        return view($this->view_dir . 'index', compact('data_list'));
    }
}

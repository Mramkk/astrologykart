<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\EasyData;
use App\Models\Plan;

class Plan_AdminController extends Controller
{
    // ======== Settings ===========

    public $view_dir = 'admin.plan.';
    public $table_name = 'plans';
    public $msg_txt = 'Plan';

    // ======== End Settings ===========

    public function index(Request $request)
    {
        $data_list = Plan::orderBy('amount', 'ASC')->get();
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
            $x->model = new Plan;
            $x->data('amount', 'amount', 'required|numeric');
            $x->data('extra', 'extra', 'nullable|numeric');
            $x->datax('status',1);
            if ($x->save()) {
                $x->status(true);
                $x->message($this->msg_txt . ' Added Successfully');
            }
            return $x->json_output();
        }


        if ($request->action == 'UPDATE') {
            $x = new EasyData;
            $x->request = $request;
            $x->model = Plan::find($request->id);
            if (!empty($x->model)) {
                $x->data('amount', 'amount', 'required|numeric');
                $x->data('extra', 'extra', 'nullable|numeric');
                if ($x->save()) {
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
        $data = Plan::find($id);
        if (!empty($data)) {
            return view($this->view_dir . 'edit', compact('data'));
        } else {
            return abort('403', 'Id Not Found');
        }
    }
}

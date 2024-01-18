<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\EasyData;
use App\Models\Popup;

class Popup_AdminController extends Controller
{
    // ======== Settings ===========

    public $view_dir = 'admin.popup.';
    public $msg_txt = 'Popup';
    public $table_name = 'popups';

    // ======== End Settings ===========

    public function index(Request $request)
    {
        $data_list = '';
        if (!empty($request->q)) {
            $search = $request->q;
            $data_list = Popup::where('html_content', 'LIKE', '%' . $search . '%');
        } else {
            $data_list = Popup::orderBy('id', 'DESC');
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
            $x->model = new Popup;
            $x->data('name', 'name', 'required|string|max:255');
            $x->data('html_content', 'html_content', 'required');
            $x->data('delay', 'delay', 'required|integer');
            $x->data('status', 'status', 'required|numeric');
            if ($x->save()) {
                $x->status(true);
                $x->message($this->msg_txt . ' Created Successfully');
            }
            return $x->json_output();
        }


        if ($request->action == 'UPDATE') {
            $x = new EasyData;
            $x->request = $request;
            $x->model = Popup::find($request->id);
            if (!empty($x->model)) {
                $x->data('name', 'name', 'required|string|max:255');
                $x->data('html_content', 'html_content', 'required');
                $x->data('delay', 'delay', 'required|integer');
                $x->data('status', 'status', 'required|numeric');
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
        $data = Popup::find($id);
        if (!empty($data)) {
            return view($this->view_dir . 'edit', compact('data'));
        } else {
            return abort('403', 'Id Not Found');
        }
    }
}

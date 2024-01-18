<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\Classes\EasyData;
use Illuminate\Support\Facades\DB;

class Master_AdminController extends Controller
{
    public $image_dir = '';
    public $table_name = '';

    public function masterRequest($request)
    {
        $image_dir = $this->image_dir;
        $table_name = $this->table_name;

        if ($request->action == 'UPDATE_STATUS') {
            $x = new EasyData;
            $x->request = $request;
            $x->model = DB::table($table_name)->where('id', $request->id)->first();
            if (!empty($x->model) and !empty($request->id)) {
                if (isset($request->status)) {
                    if ($request->status == 0 or $request->status == 1) {
                        DB::table($table_name)->where('id', $request->id)->update(['status' => $request->status]);
                        $x->status(true);
                        $x->message('Status Updated Successfully');
                    } else {
                        $x->message('Invalid Status Value.');
                    }
                } else {
                    $x->message('Status value is required.');
                }
            } else {
                $x->message('Something Error...!');
            }
            return $x->json_output();
        }

        if ($request->action == 'DELETE') {
            $x = new EasyData;
            $x->request = $request;
            $x->model = DB::table($table_name)->where('id', $request->id)->first();
            if (!empty($x->model)) {
                DB::table($table_name)->where('id', $request->id)->delete();
                if (!empty($image_dir)) {
                    if (!empty($x->model->image)) {
                        $x->delete_file($image_dir, $x->model->image);
                    }
                    if (!empty($x->model->image1)) {
                        $x->delete_file($image_dir, $x->model->image1);
                    }
                    if (!empty($x->model->image2)) {
                        $x->delete_file($image_dir, $x->model->image2);
                    }
                    if (!empty($x->model->image3)) {
                        $x->delete_file($image_dir, $x->model->image3);
                    }
                }

                $x->status(true);
                $x->message('Item Deleted Successfully');
            } else {
                $x->message('Something Error...!');
            }
            return $x->json_output();
        }

        if ($request->action == 'DELETE_IMAGE') {
            $x = new EasyData;
            $x->request = $request;
            $x->model = DB::table($table_name)->where('id', $request->id)->first();
            if (!empty($x->model) and !empty($request->id)) {
                if (!empty($request->column)) {
                    $col_name = $request->column;
                    $img_name = $x->model->$col_name;
                    if ($col_name == 'image' or $col_name == 'image1' or $col_name == 'image2' or $col_name == 'image3' or $img_name == 'thumbnail') {
                        DB::table($table_name)->where('id', $request->id)->update([$request->column => null]);
                        if (!empty($image_dir)) {
                            $x->delete_file($image_dir, $img_name);
                        }
                        $x->status(true);
                        $x->message('Image deleted successfully');
                    } else {
                        $x->message('Failed to delete image.');
                    }
                } else {
                    $x->message('Something is missing..!');
                }
            } else {
                $x->message('Something Error...!');
            }
            return $x->json_output();
        }

        if ($request->action == 'REORDER') {
            $x = new EasyData;
            $x->request = $request;
            $x->vdata('id', 'required|numeric');
            $x->vdata('serial_no', 'required|numeric');
            if ($x->validate()) {
                $serial_no = $request->serial_no;
                $id = $request->id;
                $data = DB::table($table_name)->where('id', $id)->first();
                if (!empty($data) and $serial_no > 0) {
                    if (DB::table($table_name)->where('id', $id)->update(['serial_no'=>$serial_no]) > 0) {
                        $list = DB::table($table_name)->where('id', '!=', $data->id)->orderBy('serial_no', 'ASC')->get();
                        if ($list->count() > 0) {
                            $i = 1;
                            foreach ($list as $data) {
                                $i = $i == $serial_no ? $i + 1 : $i;
                                DB::table($table_name)->where('id', $data->id)->update(['serial_no'=>$i]);
                                $i = $i + 1;
                            }
                        }
                    }
                }
                $x->status(true);
                $x->message('Item Reorded Successfully');
            }
            return $x->json_output();
        }

        return false;
    }
}

<?php

namespace App\Http\Controllers\Api\Recharge;

use App\Helpers\ApiRes;
use App\Http\Controllers\Controller;
use App\Models\Recharge;
use Illuminate\Http\Request;

class ApiRechargeController extends Controller
{
    public function data()
    {
        try {
            $data = Recharge::latest()->where('uid', auth()->user()->uid)->get();
            return ApiRes::data("Datalist", $data);
        } catch (\Throwable $th) {
            return ApiRes::failed($th->getMessage());
            // return ApiRes::error();
        }
    }
}

<?php

namespace App\Http\Controllers\Api\Plan;

use App\Helpers\ApiRes;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class ApiPlanController extends Controller
{
    public function data(Request $req)
    {
        $data = Plan::where('status', 1)->get();
        return ApiRes::data('All Plan', $data);
    }
}

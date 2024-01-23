<?php

namespace App\Http\Controllers\Api\Slider;

use App\Helpers\ApiRes;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class ApiSliderController extends Controller
{
    public function data()
    {
        $data = Slider::where('status', 1)->orderBy('serial_no', 'asc')->get();
        return ApiRes::data('All Slider', $data);
    }
}

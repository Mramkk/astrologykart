<?php

namespace App\Http\Controllers\Api\Horoscope;

use App\Helpers\ApiRes;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiHoroscopeController extends Controller
{
    public function data(Request $req)
    {
        $status = $this->horoscope($req->sign);
        $data = json_decode($status);
        $data = array($data);

        if ($status) {
            return ApiRes::data("Today Horoscope", $data);
        } else {
            return ApiRes::error();
        }
    }

    public function horoscope($sign)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://ohmanda.com/api/horoscope/' . $sign,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',

            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}

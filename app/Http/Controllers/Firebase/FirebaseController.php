<?php

namespace App\Http\Controllers\Firebase;

use App\Helpers\ApiRes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;

class FirebaseController extends Controller
{
    protected $chat;
    public function __construct()
    {
        $firebase = (new Factory)
            ->withServiceAccount(env('FIREBASE_CREDENTIALS'))
            ->withDatabaseUri('https://astrologykart-5ed9a-default-rtdb.firebaseio.com/');
        $database = $firebase->createDatabase();
        $this->chat = $database
            ->getReference('chat');
    }

    public function save()
    {
        $milliseconds = floor(microtime(true) * 1000);
        $status =  $this->chat->set([
            'id' => $milliseconds,
        ]);

        if ($status) {
            return ApiRes::success("Data saved");
        } else {
            return ApiRes::error();
        }
    }
}

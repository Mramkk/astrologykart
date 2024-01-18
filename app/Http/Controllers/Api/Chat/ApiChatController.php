<?php

namespace App\Http\Controllers\Api\Chat;

use App\Helpers\ApiRes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Firebase\FirebaseController;
use App\Models\Chat;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Image;

class ApiChatController extends Controller
{
    public function save(Request $req)
    {
        $status = null;

        $room = ChatRoom::whereIn('sender_id', [auth()->user()->id, $req->receiver_id])->whereIn('receiver_id', [$req->receiver_id, auth()->user()->id])->first();

        if ($room == null) {
            $uid = uniqid();
            $room = new ChatRoom();
            $room->uid = $uid;
            $room->sender_id = auth()->user()->id;
            $room->receiver_id = $req->receiver_id;
            $status = $room->save();
            if ($status) {
                $chat = new Chat();
                $chat->chat_room_id = $uid;
                $chat->sender_id =  auth()->user()->id;
                $chat->receiver_id = $req->receiver_id;
                $chat->message = $req->message;
                $status = $chat->save();
                if (!$req->hasFile('image') && !$req->hasFile('file')) {
                    if ($status) {
                        return ApiRes::success("Messeage Sent Successfully !");
                    } else {
                        return ApiRes::error();
                    }
                } else {
                    if ($req->hasFile('image')) {
                        $name =  uniqid() . ".webp";
                        $path = 'assets/img/chat/';
                        $file = $req->file('file');
                        $status =  $file->move($path, $name);
                        $chat->image = $path . $name;
                        $chat->is_image = "1";
                        $chat->save();
                        if ($status) {
                            return ApiRes::success("Messeage Sent Successfully !");
                        } else {
                            return ApiRes::error();
                        }
                    } elseif ($req->hasFile('file')) {
                        $uid = uniqid();
                        $file = $req->file('file');
                        $ext =  $file->getClientOriginalExtension();
                        $filename =  $uid . '.' . $ext;
                        $path = 'assets/files/chat/';
                        $status =  $file->move($path, $filename);
                        $chat->file = $path . $filename;
                        $chat->is_file = "1";
                        $status = $chat->save();
                        if ($status) {
                            $fb =  new FirebaseController();
                            $fb->save();
                            return ApiRes::success("Messeage Sent Successfully !");
                        } else {
                            return ApiRes::error();
                        }
                    }
                }
            }
        } else {

            $chat = new Chat();
            $chat->chat_room_id =  $room->uid;
            $chat->sender_id =  auth()->user()->id;
            $chat->receiver_id = $req->receiver_id;
            $chat->message = $req->message;
            $status = $chat->save();
            if (!$req->hasFile('image') && !$req->hasFile('file')) {
                if ($status) {
                    $fb =  new FirebaseController();
                    $fb->save();
                    return ApiRes::success("Messeage Sent Successfully !");
                } else {
                    return ApiRes::error();
                }
            } else {
                if ($req->hasFile('image')) {
                    $name =  uniqid() . ".webp";
                    $path = 'assets/img/chat/';
                    $file = $req->file('file');
                    $status =  $file->move($path, $name);
                    $chat->image = $path . $name;
                    $chat->is_image = "1";
                    $chat->save();
                    if ($status) {
                        return ApiRes::success("Messeage Sent Successfully !");
                    } else {
                        return ApiRes::error();
                    }
                } elseif ($req->hasFile('file')) {
                    $uid = uniqid();
                    $file = $req->file('file');
                    $ext =  $file->getClientOriginalExtension();
                    $filename =  $uid . '.' . $ext;
                    $path = 'assets/files/chat/';
                    $status =  $file->move($path, $filename);
                    $chat->file = $path . $filename;
                    $chat->is_file = "1";
                    $status = $chat->save();
                    if ($status) {
                        return ApiRes::success("Messeage Sent Successfully !");
                    } else {
                        return ApiRes::error();
                    }
                }
            }
        }
    }

    public function data(Request $req)
    {
        $room = ChatRoom::whereIn('sender_id', [auth()->user()->id, $req->receiver_id])->whereIn('receiver_id', [$req->receiver_id, auth()->user()->id])->first();
        $chat =   Chat::Where('chat_room_id', $room->uid)->latest()->get();
        if ($chat) {
            return ApiRes::data("Chat Datalist", $chat);
        } else {
            return ApiRes::error();
        }
    }
    public function receiver(Request $req)
    {
        $room = ChatRoom::whereIn('sender_id', [auth()->user()->id, $req->receiver_id])->whereIn('receiver_id', [$req->receiver_id, auth()->user()->id])->first();
        $chat =   Chat::Where('chat_room_id', $room->uid)->Where('sender_id', $req->receiver_id)->get();
        if ($chat) {
            return ApiRes::data("Chat Datalist", $chat);
        } else {
            return ApiRes::error();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function contacts(){
        $contacts=User::where('id','!=', auth()->user()->id)->get();

        return response()->json($contacts);
    }
    public function fetchMessages($id){
        $messages=Message::where('from',$id)->orWhere('to',$id)->get();
        return response()->json($messages);
    }
}

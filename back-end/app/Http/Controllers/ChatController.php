<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\Events\ChatEvent;
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
    public function storeMessage(Request $request){
        $message=Message::create([
            'body'=>$request->body,
            'from'=>auth()->user()->id,
            'to'=>$request->to,
        ]);
        broadcast(new ChatEvent($message));
        return response()->json($message);
    }
}

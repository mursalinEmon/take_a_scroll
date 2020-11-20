<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function contacts(){
        $contacts=User::all();

        return response()->json($contacts);
    }
}

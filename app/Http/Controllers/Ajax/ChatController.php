<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Auth;

class ChatController extends Controller
{
    public function index() {
        return \App\Message::orderBy('id', 'desc')->get();
    }
    
    public function create(Request $request) {

        $auths = Auth::user();

        \App\Message::create([
            'body' => $request->message,
            'user_id' => $auths->id,
            'post_id' => $request->post_id
        ]);
    }
}

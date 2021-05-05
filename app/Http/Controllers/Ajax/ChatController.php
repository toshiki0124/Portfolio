<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use App\Post;
use Auth;

class ChatController extends Controller
{
    
    public function index() {
        return \App\Message::with('user')->with('post')->orderBy('id', 'desc')->get();
    }
    
    public function create(Request $request) {

        $auths = Auth::user();

        $message = \App\Message::create([
            'body' => $request->message,
            'user_id' => $auths->id,
            'post_id' => $request->post_id
        ]);
        
        //event(new MessageCreated($message));
    }
}
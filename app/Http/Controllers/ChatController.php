<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Join_request;
use App\User;
use App\Post;
use App\Message;
use Auth;


class ChatController extends Controller
{
    public function talk_room(Join_request $join_request, User $user, Post $post, Message $message)
    {
        $auths = Auth::user();
        return view('talk_room')->with(['post' => $post])->with(['messages' => $message->get()]);
    }
}

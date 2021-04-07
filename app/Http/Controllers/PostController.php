<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Place;
use App\Test;
use Auth;

class PostController extends Controller
{
    public function index(User $user)
    {
        return view('index')->with(['users' => $user->get()]);
    }

    public function post(Post $post)
    {
        return view('post')->with(['posts' => $post->get()]);
    }

    public function detail(Post $post)
    {
        return view('detail')->with(['post' => $post]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $post['user_id'] = Auth::id();
        $post->fill($input)->save();
        
        return redirect('/posts/' . $post->id);
    }
}

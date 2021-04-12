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

    public function create(Place $place)
    {
        return view('create')->with(['places' => $place->get()]);
    }

    public function edit(Post $post, Place $place)
    {
        return view('edit')->with(['post' => $post])->with(['places' => $place->get()]);
    }

    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $post['user_id'] = Auth::id();
        $post->fill($input)->save();
        
        return redirect('/posts/' . $post->id);
    }

    public function update(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}

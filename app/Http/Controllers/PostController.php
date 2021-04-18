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

    public function mypage()
    {
        $auths = Auth::user();
        return view('mypage')->with(['auths' => $auths]);
    }

    public function myposts()
    {
        $auths = Auth::id();
        $posts = User::find($auths)->posts;
        return view('myposts')->with(['posts' => $posts]);
    }

    public function mypost(Post $post, Place $place)
    {
        return view('mypost')->with(['post' => $post])->with(['places' => $place->get()]);
    }

    public function myedit(Post $post, Place $place)
    {
        return view('myedit')->with(['post' => $post])->with(['places' => $place->get()]);
    }

    public function profile_edit()
    {
        $auths = Auth::user();
        return view('profile_edit')->with(['auths' => $auths]);
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

    public function profile_update(Request $request)
    {   

        $input_user = $request['user'];
        if (isset($input_user['file_name'])){
            $path = $input_user['file_name']->store('public/images');
            $filename = basename($path);
            $input_user['file_name'] = $path;
        } else {
            ;
        }
        $auths = Auth::user();
        $auths->fill($input_user)->save();

        return redirect('/posts/mypage');
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}

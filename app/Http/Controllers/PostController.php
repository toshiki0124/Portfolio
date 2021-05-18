<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Place;
use App\Test;
use App\Join_request;
use App\Message;
use Auth;
use Storage;

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

    // 記事の詳細表示
    public function detail(Post $post, Join_request $join_request)
    {
        $number = 0;
        $auths = Auth::user();
        
        return view('detail')->with(['post' => $post])
                             ->with(['auths' => $auths])
                             ->with(['join_requests' => $join_request->get()])
                             ->with(['number' => $number]);
    }

    public function host_profile(User $user)
    {
        return view('host_profile')->with(['user' => $user]);
    }

    public function create(Place $place)
    {
        $number = 0;
        return view('create')->with(['places' => $place->get()])->with(['number' => $number]);
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

    // リクエスト確認ページ
    public function request_conf(Join_request $join_request, Post $post, User $user)
    {
        $auths = Auth::user();
        $requested_posts = $post->where('user_id', $auths->id);

        return view('request_conf')->with(['auths' => $auths])
                                   ->with(['requested_posts' => $requested_posts->get()])
                                   ->with(['join_requests' => $join_request->get()])
                                   ->with(['posts' => $post->get()])
                                   ->with(['users' => $user->get()]);
    }

    // 記事投稿
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $post['user_id'] = Auth::id();

        // バリデーション
        $validatedData = $request->validate([
            'post.title' => ['required', 'max:30'],
            'post.detail_place' => ['required', 'max:200'],
            'post.body' => ['max:255']
        ]);
        

        // 保存
        $post->fill($input)->save();
        
        return redirect('/posts/' . $post->id);
    }

    // 記事編集
    public function update(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }

    // プロフィール編集、ここで初めてプロフ画の設定可能
    public function profile_update(Request $request)
    {   
        $input_user = $request['user'];
        if (isset($input_user['file_name'])){
            //受け取ったファイルの情報をimageに代入
            $image = $input_user['file_name'];
            //バケットのmyprefixフォルダへアップロード
            $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
            //アップロードした画像のパス取得
            $input_user['file_name'] = Storage::disk('s3')->url($path);
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

    // 参加リクエストボタンが押された時の処理
    public function join_request(Request $request, Join_request $join_request, Post $post)
    {
        $path['user_id'] = (int)$request['user_id'];
        $path['post_id'] = $post->id;
        $join_request->fill($path)->save();

        return redirect('/posts/' . $post->id);
    }

    // ホストが、参加を許可した時の処理　数字の「0」「1」で判断
    public function request_approval(Request $request, Join_request $join_request, Post $post)
    {
        $pass['to_distinguish_number'] = (int)$request['to_distinguish_number'];
        $join_request->fill($pass)->save();

        return redirect('/posts/mypage/request_conf');
    }

    // ホストが参加を拒否した時の処理
    public function request_disapproval(Join_request $join_request)
    {
        $join_request->delete();

        return redirect('/posts/mypage/request_conf');
    }

    public function show_rooms(Join_request $join_request, User $user, Post $post)
    {
        $auths = Auth::user();
        // データの絞り込み
        $myposts = $post->where('user_id', $auths->id);
        $requested_posts = $join_request->where('user_id', $auths->id);

        return view('show_rooms')->with(['myposts' => $myposts->get()])
                                 ->with(['requested_posts' => $requested_posts->get()]);
    }
}

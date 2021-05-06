@extends('layouts.app')

@section('content')
        <div class="page_title">
            <div class="container">
                <h1>個人ページ</h1>
            </div>
        </div>
        <div class="my_contents">
            <div class="container">
                <div class="name">
                    <br>
                    <h4>名前:{{ $auths->name }}</h4>
                </div>
                <div class="profile_image">
                    <img src="{{ $auths->file_name }}" title="プロフィール画像" width=160px height=100px>
                </div>
                <div class="body">
                    <h5>コメント:{{ $auths->body }}</h5>
                </div>
                <div class="age">
                    <h5>年齢:{{ $auths->age }}</h5>
                </div>
                <a class="myposts" href="/posts/myposts">投稿記事一覧</a>
                <a class="edit" href="/posts/mypage/profile_edit">プロフィール編集</a>
                <a class="request_conf" href="/posts/mypage/request_conf">リクエスト確認</a>
                <br>
                <a class="back" href="/posts">戻る</a>
            </div>
        </div>
@endsection

@extends('layouts.app')

@section('content')
        <div class="page_title">
            <div class="container">
                <h1>プロフィール</h1>
            </div>
        </div>

        <div class="my_contents">
            <div class="container">
                <div class="name">
                    <br>
                    <h4>名前 : {{ $auths->name }}</h4>
                </div>

                <div class="profile_image">
                    @if ($auths->file_name == NULL)
                        <h5>画像 : 未設定</h5>
                    @else
                        <img src="{{ $auths->file_name }}" title="プロフィール画像" width=160px height=100px>
                    @endif
                </div>

                <div class="body">
                    <h5>コメント : {{ $auths->body }}</h5>
                </div>

                <div class="age">
                    <h5>年齢 : {{ $auths->age }}</h5>
                </div>

                <a class="back" href="/posts/mypage/profile_edit">
                                        プロフィール編集
                </a>

                <br>

                <a class="back" href="/posts">投稿一覧に戻る</a>
            </div>
        </div>
@endsection

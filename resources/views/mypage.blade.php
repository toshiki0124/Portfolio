@extends('layouts.app')

@section('content')
        <div class="page_title">
            <div class="container">
                <h1>プロフィール</h1>
            </div>
        </div>

        <div class="my_contents">
            <div class="container">
                <div class="name pb-3">
                    <br>
                    <h4>名前 : {{ $auths->name }}</h4>
                </div>

                <div class="profile_image pb-3">
                    @if ($auths->file_name == NULL)
                        <h5>画像 : 未設定</h5>
                    @else
                        <img src="{{ $auths->file_name }}" title="プロフィール画像" width=160px height=100px>
                    @endif
                </div>

                <div class="body pb-3">
                    <h5>コメント : {{ $auths->body }}</h5>
                </div>

                <div class="age pb-3">
                    <h5>年齢 : {{ $auths->age }}</h5>
                </div>

                <a href="/posts/mypage/profile_edit">
                                        プロフィール編集
                </a>

                <br>

                <a class="back" href="/posts">投稿一覧に戻る</a>
            </div>
        </div>
@endsection

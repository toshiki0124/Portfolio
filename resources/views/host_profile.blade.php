@extends('layouts.app')

@section('content')
        <div class="page_title">
            <div class="container">
                <h1>投稿者プロフィール</h1>
            </div>
        </div>

        <div class="host_profile">
            <div class="container">

                <div class="name pb-3">
                    <h3>名前:{{ $user->name }}</h3>
                </div>

                <div class="profile_image pb-3">
                    <img src="{{ $user->file_name }}" title="プロフィール画像" width=160px height=100px>
                </div>

                <div class="body pb-3">
                    <h5>コメント:{{ $user->body }}</h5>
                </div>

                <div class="age pb-3">
                    <h5>年齢:{{ $user->age }}</h5>
                </div>

                <button onclick="history.back()">戻る</button>
            </div>
        </div>
@endsection

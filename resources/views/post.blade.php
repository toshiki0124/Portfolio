@extends('layouts.app')

@section('content')
        <div class="post_strage">
            <div class="container">
                <div class="menu">
                    <a href="posts/mypage" class="enter"><h3>個人ページ</h3></a>
                    <a href="posts/rooms" class="enter"><h3>参加ルーム</h3></a>
                    <br>
                </div>
                <h1 class="pb-2">投稿一覧</h1>
                @foreach ($posts as $post)
                    <div class="pb-1">
                        <a href="/posts/{{ $post->id }}"><h2 class="title">{{ $post->title }}</h2></a>
                    </div>
                @endforeach
                <a href="/posts/create">新規投稿</a>
            </div>
        </div>
@endsection

@extends('layouts.app')

@section('content')
        <div class="page_title">
            <div class="container">
                <h1 class="pb-3">参加ルーム一覧</h1>
            </div>
        </div>
        
        <div class="post_strage">
            <div class="container">
                <h3>自己がホストのルーム</h3>
                <div class="room">

                    @foreach ($myposts as $mypost)
                        <ul>
                            <li class="title pr-4 pl-4"><a href="/posts/rooms/{{ $mypost->id }}/room">{{ $mypost->title }}</a></li>
                        </ul>
                    @endforeach

                </div>

                <h3>他者がホストのルーム</h3>
                <div class="room">

                    @foreach ($requested_posts as $requested_post)
                        
                        @if ($requested_post->to_distinguish_number == 1)
                            <ul>
                                <li class="title pr-4 pl-4"><a href="/posts/rooms/{{ $requested_post->post->id }}/room">{{ $requested_post->post->title }}</a></li>
                            </ul>
                        @endif

                    @endforeach

                </div>
                <a class="back" href="/posts">投稿一覧に戻る</a>
            </div>
        </div>
@endsection

@extends('layouts.app')

@section('content')
        <div class="page_title">
            <div class="container">
                <h1>投稿情報</h1>
            </div>
        </div>
        <div class="post_detail">
            <div class="container">
                <h2 class="title">タイトル：{{ $post->title }}</h2>
                <p class="prefecture">都道府県 : {{ $post->place->name }}</p>
                <p class="detail_place"> 詳細場所 : {{ $post->detail_place }}</p>
                <p class="comment">自由コメント : {{ $post->body }}</p>
                <p class="host_name">投稿者 : {{ $post->user->name }}</p>
                <a class="host_profile" href="/posts/detail/host_profile/{{ $post->user->id }}">プロフィール情報</a>
                <div class="request">
                    @if ($post->user_id == $auths->id)
                        <button type="button">{{ $auths->name }}の投稿です</button>
                        @php
                            $number -= 1;
                        @endphp
                    @else
                        @foreach ($join_requests as $join_request)
                            @if ($post->id == $join_request->post_id)
                                @if ($join_request->user_id == $auths->id)
                                    <button type="button">リクエスト済</button>
                                    @php
                                        $number -= 1;
                                    @endphp
                                @elseif ($join_request->user_id != $auths->id)
                                    
                                @endif
                            @else
                                
                            @endif
                        @endforeach
                    @endif
                    @if ($number == 0)
                        <form action="/posts/{{ $post->id }}/request" method="POST">
                            @csrf
                                <button type="submit" name="user_id" value="{{ $auths->id }}">リクエスト送信</button>
                        </form>
                    @endif
                </div>
                <a class="back" href="/posts">戻る</a>
            </div>
        </div>  
@endsection

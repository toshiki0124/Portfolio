<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portfolio</title>
    </head>
    <body>
        <header>
            <div class="container">
                <h1>投稿情報</h1>
            </div>
        </header>
        <div class="post_detail">
            <div class="container">
                <h2 class="title">タイトル：{{ $post->title }}</h2>
                <p class="prefecture">都道府県 : {{ $post->place->name }}</p>
                <p class="prefecture"> 詳細場所 : {{ $post->detail_place }}</p>
                <p class="prefecture">自由コメント : {{ $post->body }}</p>
                <p class="prefecture">投稿者 : {{ $post->user->name }}</p>
                <P class="file_image">プロフィール画像 : 画像のサイズ調整してから記述</p>
                <a href="/posts">戻る</a>
                @if ($post->user_id == $auths->id)
                    <br>
                    <button type="button">{{ $auths->name }}の投稿です</button>
                    @php
                        $number -= 1;
                    @endphp
                @else
                    @foreach ($join_requests as $join_request)
                        @if ($post->id == $join_request->post_id)
                            @if ($join_request->user_id == $auths->id)
                                <br>
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
        </div>  
    </body>
</html>

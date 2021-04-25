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
                <h1>参加ルーム一覧</h1>
            </div>
        </header>
        <div class="post_strage">
            <div class="container">
                <h3>自己がホストのルーム</h3>
                <div class="room">
                    @foreach ($myposts as $mypost)
                        <a href="/posts/rooms/{{ $mypost->id }}/room">{{ $mypost->title }}</a>
                    @endforeach
                </div>
                <h3>他者がホストのルーム</h3>
                <div class="room">
                    @foreach ($requested_posts as $requested_post)
                        @if ($requested_post->to_distinguish_number == 1)
                            <a href="/posts/rooms/{{ $requested_post->post->id }}/room">{{ $requested_post->post->title }}</a>
                        @endif
                    @endforeach
                </div>
                <a class="back" href="/posts">戻る</a>
            </div>
        </div>
    </body>
</html>

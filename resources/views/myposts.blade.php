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
                <h1>投稿した記事</h1>
            </div>
        </header>
        <div class="my_posts">
            <div class="container">
                @foreach ($posts as $post)
                    <a class="title" href="/posts/{{ $post->id }}/mypost">{{ $post->title }}</a>
                @endforeach
            </div>
            <a class="back" href="/posts/mypage">戻る</a>
        </div>
    </body>
</html>

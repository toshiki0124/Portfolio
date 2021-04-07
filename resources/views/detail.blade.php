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
                <h2 class="title">{{ $post->title }}</h2>
                <p class="prefecture">{{ $post->place->name }}</p>
                <p class="prefecture">{{ $post->detail_place }}</p>
                <p class="prefecture">{{ $post->body }}</p>
                <p class="prefecture">{{ $post->user->name }}</p>
                <a href="/posts">戻る</a>
            </div>
        </div>
        
    </body>
</html>

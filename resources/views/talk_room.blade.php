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
                <h1>「{{ $post->title }}」のトークルーム</h1>
            </div>
        </header>
        <div class="post_strage">
            <div class="container">
                <button onclick="history.back()">戻る</button>
            </div>
        </div>
    </body>
</html>

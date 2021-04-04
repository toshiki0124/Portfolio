<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portfolio</title>
    </head>
    <body>
        <header>
            <div class=container>
                <h1>Portfolio</h1>
                <a href='/register' class='enter'>個人ページ</a>
                <a href='/login' class='enter'>参加ルーム</a>
            </div>
        </header>
        <div class=post_strage>
            <div class=container>
                <h1>投稿一覧</h1>
                @foreach ($posts as $post)
                    <div class='post'>
                        <a href="/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title }}</h2></a>
                    </div>
                @endforeach
            </div>
        </div>
        
    </body>
</html>

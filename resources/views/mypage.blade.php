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
                <h1>個人ページ</h1>
                <a class="logout" href="/login">ログアウト</a>
            </div>
        </header>
        <div class="my_contents">
            <div class="container">
                <div class="name">
                    <h3>{{ $auths->name }}</h3>
                </div>
                <div class="body">
                    <p>{{ $auths->body }}</p>
                </div>
                <div class="age">
                    <p>{{ $auths->age }}</p>
                </div>
                <a class="myposts" href="/posts/myposts">投稿記事一覧</a>
                <a class="back" href="/posts">戻る</a>
            </div>
        </div>
    </body>
</html>

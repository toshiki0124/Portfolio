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
                <h1>投稿者プロフィール</h1>
            </div>
        </header>
        <div class="host_profile">
            <div class="container">
                <div class="name">
                    <h3>名前:{{ $user->name }}</h3>
                </div>
                <div class="profile_image">
                    <img src="{{ Storage::url($user->file_name) }}" title="プロフィール画像">
                </div>
                <div class="body">
                    <p>コメント:{{ $user->body }}</p>
                </div>
                <div class="age">
                    <p>年齢:{{ $user->age }}</p>
                </div>
                <button onclick="history.back()">戻る</button>
            </div>
        </div>
    </body>
</html>

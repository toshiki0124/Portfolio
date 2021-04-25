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
                <div class="profile_image">
                    <img src="{{ Storage::url($auths->file_name) }}" title="プロフィール画像">
                </div>
                <div class="name">
                    <h3>名前:{{ $auths->name }}</h3>
                </div>
                <div class="body">
                    <p>コメント:{{ $auths->body }}</p>
                </div>
                <div class="age">
                    <p>年齢:{{ $auths->age }}</p>
                </div>
                <a class="myposts" href="/posts/myposts">投稿記事一覧</a>
                <a class="edit" href="/posts/mypage/profile_edit">プロフィール編集</a>
                <a class="request_conf" href="/posts/mypage/request_conf">リクエスト確認</a>
                <br>
                <a class="back" href="/posts">戻る</a>
            </div>
        </div>
    </body>
</html>

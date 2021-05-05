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
                <h1>プロフィール編集</h1>
            </div>
        </header>
        <div class="my_contents">
            <div class="container">
                <form action="/posts/mypage" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="image_update">
                        <h2>画像選択</h2>
                        <input type="file" name="user[file_name]" accept=".png,.jpg,.jpeg,image/png,image/jpg">
                        <p>元の画像<br><img src="{{ $auths->file_name }}"></p>
                    </div>
                    <div class="name">
                        <h2>名前</h2>
                        <input type="text" name="user[name]" value="{{ $auths->name }}">
                    </div>
                    <div class="body">
                        <h2>コメント</h2>
                        <input type="text" name="user[body]" value="{{ $auths->body }}">
                    </div>
                    <div class="age">
                        <h2>年齢</h2>
                        <input type="number" min="15" max="80" name="user[age]" value="{{ $auths->age }}">
                    </div>
                    <br>
                    <input type="submit" value="保存する"/>
                    <button onclick="history.back()">戻る</button>
                </form>
            </div>
        </div>
    </body>
</html>

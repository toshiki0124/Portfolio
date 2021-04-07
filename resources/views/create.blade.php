<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portfolio</title>
    </head>
    <body>
        <header>
            <div class='container'>
                <h1>新規投稿</h1>
            </div>
        </header>
        <div class="post_form">
            <div class="container">
                <form action="/posts" method="POST">
                @csrf
                    <div class="title">
                        <h2>タイトル</h2>
                        <input type="text" name="post[title]" placeholder="後で考える"/>
                    </div>
                    <div class="place">
                        <P>都道府県</p>
                        <input type="number" name="post[place_id]"/>
                        <p>詳細場所</p>
                        <input type="text" name="post[detail_place]" placeholder="これも後で"/>
                    </div>
                    <div class="body">
                        <p>自由コメント欄</p>
                        <TEXTAREA name="post[body]" placeholder="後で"></TEXTAREA>
                    </div>
                    <input type="submit" value="投稿する"/>


                    <!-
                    次回やること
                    ログインユーザーの情報追加
                    都道府県の選択式
                    投稿作成処理の実行
                    ->


                </form>
                <a href="/posts">戻る</a>
            </div>
        </div>
    </body>
</html>
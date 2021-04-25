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
                <h1>新規投稿</h1>
            </div>
        </header>
        <div class="post_form">
            <div class="container">
                <form action="/posts" method="POST">
                @csrf
                    <div class="title">
                        <h2>タイトル</h2>
                        <input type="text" name="post[title]" placeholder=""/>
                    </div>
                    <div class="place">
                        <P>都道府県</p>
                        <select name="post[place_id]">
                        @foreach ($places as $place)
                        <option value="{{ $place->id }}">
                            {{ $place->name }}
                        </option>
                        @endforeach
                        </select>
                        <p>詳細場所</p>
                        <input type="text" name="post[detail_place]" placeholder=""/>
                    </div>
                    <div class="body">
                        <p>自由コメント欄</p>
                        <TEXTAREA name="post[body]" placeholder=""></TEXTAREA>
                    </div>
                    <input type="submit" value="投稿する"/>
                </form>
                <button onclick="history.back()">戻る</button>
            </div>
        </div>
    </body>
</html>
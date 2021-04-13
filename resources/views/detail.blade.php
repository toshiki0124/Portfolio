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
                <h2 class="title">タイトル：{{ $post->title }}</h2>
                <p class="prefecture">都道府県 : {{ $post->place->name }}</p>
                <p class="prefecture"> 詳細場所: {{ $post->detail_place }}</p>
                <p class="prefecture">自由コメント : {{ $post->body }}</p>
                <p class="prefecture">投稿者 : {{ $post->user->name }}</p>
                <a href="/posts">戻る</a>
                <a href="/posts/{{ $post->id }}/edit">編集</a>
                <form action="/posts/{{ $post->id }}" method="POST" sytle="display:inline">
                    @csrf 
                    @method('DELETE')
                    <input type="submit" value="削除">
                </form>
            </div>
        </div>  
    </body>
</html>

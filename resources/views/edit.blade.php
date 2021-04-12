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
                <h1>編集画面</h1>
            </div>
        </header>
        <div class="post_form">
            <div class="container">
                <form action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="title">
                        <h2>タイトル</h2>
                        <input type="text" name="post[title]" value="{{ $post->title }}"/>
                    </div>
                    <div class="place">
                        <P>都道府県</p>
                        <select name="post[place_id]">
                            <option value="{{ $post->place_id }}" selected>
                                {{ $post->place->name }}
                            </option>
                            @foreach ($places as $place)
                                <option value="{{ $place->id }}">
                                    {{ $place->name }}
                                </option>
                            @endforeach
                        </select>
                        <p>詳細場所</p>
                        <input type="text" name="post[detail_place]" value="{{ $post->detail_place }}"/>
                    </div>
                    <div class="body">
                        <p>自由コメント欄</p>
                        <TEXTAREA name="post[body]">{{ $post->body }}</TEXTAREA>
                    </div>
                    <input type="submit" value="投稿する"/>
                </form>
            </div>
        </div>
    </body>
</html>
@extends('layouts.app')

@section('content')
        <div class="page_title">
            <div class="container">
                <h1>編集画面</h1>
            </div>
        </div>
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

                        <h5>都道府県</h5>

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

                        <h5>詳細場所</h5>
                        <input type="text" name="post[detail_place]" value="{{ $post->detail_place }}"/>
                    </div>

                    <div class="body">
                        <h5>自由コメント欄</h5>
                        <TEXTAREA name="post[body]">{{ $post->body }}</TEXTAREA>
                    </div>

                    <input type="submit" value="投稿する"/>
                    
                </form>

                <button onclick="history.back()">戻る</button>
            </div>
        </div>
@endsection
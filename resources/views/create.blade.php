@extends('layouts.app')

@section('content')
        <div class="page_title">
            <div class="container">
                <h1>新規投稿</h1>
            </div>
        </div>
        <div class="post_form">
            <div class="container">
                <form action="/posts" method="POST">
                @csrf
                    <div class="title">
                        <h2>タイトル</h2>
                        <input type="text" name="post[title]" placeholder=""/>
                    </div>
                    <div class="place">
                        <h5>都道府県</h5>
                            <select name="post[place_id]">
                                @foreach ($places as $place)
                                    <option value="{{ $place->id }}">
                                        {{ $place->name }}
                                    </option>
                                @endforeach
                            </select>
                        <h5>詳細場所</h5>
                            <input type="text" name="post[detail_place]" placeholder=""/>
                    </div>
                    <div class="body">
                        <h5>自由コメント欄</h5>
                        <TEXTAREA name="post[body]" placeholder=""></TEXTAREA>
                    </div>
                    <input type="submit" value="投稿する"/>
                </form>
                <button onclick="history.back()">戻る</button>
            </div>
        </div>
@endsection
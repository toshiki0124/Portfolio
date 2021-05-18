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

                    <div>
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


                            @foreach ($errors->all() as $error)
                                @if ($number == 0)
                                    @if (isset($errors))
                                        <p class="validation">※必須項目です<p>

                                        <!-- 二回表示させないための処理 -->
                                        @php
                                            $number -= 1;
                                        @endphp
                                    @endif
                                @endif
                            @endforeach
                    </div>

                    <div class="body">
                        <h5>自由コメント欄</h5>
                        <TEXTAREA name="post[body]" placeholder="時間や人数、レベルなど"></TEXTAREA>
                    </div>

                    <input type="submit" value="投稿する"/>

                </form>
                <a href="/posts">投稿一覧に戻る</a>
            </div>
        </div>
@endsection
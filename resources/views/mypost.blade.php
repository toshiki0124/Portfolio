@extends('layouts.app')

@section('content')
        <div class="page_title">
            <div class="container">
                <h1>投稿情報</h1>
            </div>
        </div>

        <div class="post_detail">
            <div class="container">

                <h2 class="title">タイトル：{{ $post->title }}</h2>

                <p class="prefecture">都道府県 : {{ $post->place->name }}</p>

                <p class="prefecture"> 詳細場所: {{ $post->detail_place }}</p>

                <p class="prefecture">自由コメント : {{ $post->body }}</p>

                <p class="prefecture">投稿者 : {{ $post->user->name }}</p>
                
                <button onclick="history.back()">戻る</button>

                <a href="/posts/{{ $post->id }}/mypost/edit" class="back">編集</a>

                <form action="/posts/{{ $post->id }}" id="form_delete" method="POST" sytle="display:inline">
                    @csrf 
                    @method('DELETE')
                    <button type="button"><span onclick="return deletePost(this);">削除</span></botton>
                </form>

            </div>
        </div>
        
        <script>
            function deletePost(e) {
                'use strict';
                if (confirm('削除すると復元できません。\n本当に削除しますか？'))　{
                    document.getElementById('form_delete').submit();
                }
            }
        </script>
@endsection
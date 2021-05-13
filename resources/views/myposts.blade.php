<!DOCTYPE html>
@extends('layouts.app')

@section('content')
        <div class="page_title">
            <div class="container">
                <h1>投稿した記事</h1>
            </div>
        </div>
        
        <div class="my_posts">
            <div class="container">

                @foreach ($posts as $post)
                    <a class="title" href="/posts/{{ $post->id }}/mypost">{{ $post->title }}</a>
                    <br>
                @endforeach
                
                <a class="back" href="/posts">投稿一覧に戻る</a>

            </div>
        </div>
@endsection
</html>

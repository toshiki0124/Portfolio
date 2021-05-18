<!DOCTYPE html>
@extends('layouts.app')

@section('content')
        <div class="page_title">
            <div class="container">
                <h1 class="pb-3">投稿した記事</h1>
            </div>
        </div>

        <div class="my_posts">
            <div class="container">

                @foreach ($posts as $post)
                    <div class="pb-1">
                        <a href="/posts/{{ $post->id }}/mypost"><h2 class="title">{{ $post->title }}</h2></a>
                    </div>
                @endforeach
                
                <a class="create" href="/posts">投稿一覧に戻る</a>

            </div>
        </div>
@endsection
</html>

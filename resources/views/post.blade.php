@extends('layouts.app')

@section('content')
        <div class="post_strage">
            <div class="container">
                <h1 class="pb-2">投稿一覧</h1>
                @foreach ($posts as $post)
                    <div class="pb-1">
                        <a href="/posts/{{ $post->id }}"><h2 class="title">{{ $post->title }}</h2></a>
                    </div>
                @endforeach
                <a href="/posts/create" class="create">新規投稿</a>

                <div class='paginate, pt-3'>
                    {{ $posts->links() }} 
                </div>
            </div>
        </div>
@endsection

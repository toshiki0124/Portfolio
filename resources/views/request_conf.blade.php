@extends('layouts.app')

@section('content')
        <div class="page_title">
            <div class="container">
                <h1>リクエスト確認</h1>
            </div>
        </div>
        <div class="requested">
            <div class="container">

                @foreach ($join_requests as $join_request)

                    @if ($join_request->user_id != $auths->id)

                        @if ($join_request->post->user_id == $auths->id)
                            <!-- 誰がリクエストしたかの処理 -->
                            <h5 class="pt-4">{{ $join_request->post->title }}</h5>
                            <h5 style="display:inline;"> </h5>
                            <h5>
                                <a class="host_profile" href="/posts/detail/host_profile/{{ $join_request->user->id }}" style="display:inline;">
                                「{{ $join_request->user->name }}」
                                </a>
                                からのリクエスト
                            </h5>

                            @if ($join_request->to_distinguish_number == 0)

                                <form action="/posts/mypage/request_approval/{{ $join_request->id }}" method="POST">
                                    @csrf
                                    @method("PUT")
                                    <button type="submit" name="to_distinguish_number" value="1">許可</button>
                                </form>

                                <form action="/posts/mypage/request_disapproval/{{ $join_request->id }}" id="disapproval_form" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="button"><span onclick="return request_disapproval(this)">許否</span></button>
                                </form>

                            @else

                                <button type="button">許可済</button>

                            @endif

                        @endif

                    @endif

                @endforeach
                <div class="pt-4">
                <a class="back" href="/posts">投稿一覧に戻る</a>
                </div>
            </div>
        </div>
        <script>
            function request_disapproval (e) {
                    'use strict';
                    if (confirm('一度拒否すると戻せません。\n拒否しますか？'))　{
                        document.getElementById('disapproval_form').submit();
                    }
                }
        </script>
@endsection

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
                <h1>リクエスト確認ページ</h1>
                <button onclick="history.back()">戻る</button>
            </div>
        </header>
        <div class="requested">
            <div class="container">
                @foreach ($join_requests as $join_request)
                    @if ($join_request->user_id != $auths->id)
                        @if ($join_request->post->user_id == $auths->id)
                            <p>{{ $join_request->post->title }}</p>
                            <p>「{{ $join_request->user->name }}」からのリクエスト</p>
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
    </body>
</html>

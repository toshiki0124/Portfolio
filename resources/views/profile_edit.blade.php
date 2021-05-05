@extends('layouts.app')

@section('content')
        <div class="page_title">
            <div class="container">
                <h1>プロフィール編集</h1>
            </div>
        </div>
        <div class="my_contents">
            <div class="container">
                <form action="/posts/mypage" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="image_update">
                        <br>
                        <h4>画像選択</h4>
                        <input type="file" name="user[file_name]" accept=".png,.jpg,.jpeg,image/png,image/jpg">
                        <p>元の画像<br><img src="{{ $auths->file_name }}"></p>
                    </div>
                    <div class="name">
                        <h5>名前</h5>
                        <input type="text" name="user[name]" value="{{ $auths->name }}">
                    </div>
                    <div class="body">
                        <h5>コメント</h5>
                        <input type="text" name="user[body]" value="{{ $auths->body }}">
                    </div>
                    <div class="age">
                        <h5>年齢</h5>
                        <input type="number" min="15" max="80" name="user[age]" value="{{ $auths->age }}">
                    </div>
                    <br>
                    <input type="submit" value="保存する"/>
                    <button onclick="history.back()">戻る</button>
                </form>
            </div>
        </div>
@endsection

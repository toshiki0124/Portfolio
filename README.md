# Tennis Matching
テニスプレイヤーへ向けたマッチングアプリです。<br>
参加者を募る投稿、それに対して参加のリクエストを送り、許可された場合のみトークルームに参加という形式でマッチングを成立させています。<br>
サイトurl : http://shrouded-waters-22362.herokuapp.com/
<img width="1440" alt="スクリーンショット 2021-05-14 1 31 14" src="https://user-images.githubusercontent.com/75344329/118166373-5d4b2d00-b460-11eb-8720-7ba1d66004db.png">

# 使用技術
<ul>
    <li>MacOS</li>
    <li>HTML/CSS</li>
    <li>JavaScript</li>
    <li>php 7.4.12</li>
    <li>vue.js 2.6.12</li>
    <li>laravel 6.20.20</li>
    <li>Postgres 13.2</li>
    <li>AWS</li>
        <ul type="circle">
            <li>s3</li>
        </ul>
    <li>Heroku</li>
    <li>Pusher Channels API</li>
</ul>

# 機能一覧
<ul>
    <li>ユーザー登録、ログイン機能（laravel）</li>
    <li>ユーザー情報編集機能</li>
        <ul type="circle">
            <li>画像アップロード</li>
        </ul>
    <li>投稿機能</li>
        <ul type="circle">
            <li>投稿</li>
            <li>編集</li>
            <li>削除</li>
        </ul>
    <li>バリデーション</li>
    <li>参加リクエスト送信機能</li>
    <li>受信したリクエストに対する拒否可否</li>
        <ul type="circle">
            <li>拒否時の確認ポップアップ表示</li>
        </ul>
    <li>リアルタイムチャット機能（Ajax）</li>
</ul>

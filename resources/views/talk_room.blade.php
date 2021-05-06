<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Tennis Matching
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <br>
        
        <!-- ここからが自分のコード -->

        <div class="page_title">
            <div class="container">
                <h1>『{{ $post->title }}』のトークルーム</h1>
                <!-- pusherの機能がうまく行っていないため -->
                <p>※送信後、リロードを行えばメッセージが反映されます。</p>
                <!-- 参加しているメンバーの表示とかも行えたらいいかも -->
            </div>
        </div>

        <div class="chat-display">
            <div class="container">

                <div id="chat">
                    <!-- sendの実行 -->
                    <textarea v-model="message"></textarea>{{--入力された値はdataのmessageに入る、vーmodelにより--}}
                    <br>
                    <button type="button" @click="send">送信</button>

                    <!-- メッセージの取得、表示 -->
                    <div v-for="message in messages">
                        <div v-if="post_id == message.post.id">
                            <span v-text="message.user.name"></span>：&nbsp;
                            <span v-text="message.body"></span>
                        </div>
                    </div>

                </div>
                
                <button onclick="history.back()">戻る</button>

            </div>
        </div>

        <script src="/js/app.js"></script>
        <script>
            new Vue({ //Vueのインスタンス化により使用可能に
                el: '#chat',　//有効範囲の指定,id="chat"のところだけ
                data: { //データバインディング、ここにある変数をhtmlで表示できる
                    message: '',
                    post_id: parseInt('{{ $post->id }}'),
                    messages: [] //messageには空文字列、messagesには空のリストを与えてる
                },
                methods: {
                    getMessages() {

                        const url = '/ajax/chat';
                        axios.get(url)
                            .then((response) => {

                                this.messages = response.data;

                            });
                    },
                    send() {
                        const url = '/ajax/chat'; //constは再定義できない変数　
                        const params = {message: this.message, post_id: this.post_id };
                        axios.post(url, params) // 第二引数に送信するデータ 
                            .then((response) => {
                                this.message = '';//thisを通してdataのmessageにアクセス
                            });
                    }
                },
                mounted () {
                    
                    this.getMessages();
                    
                    Echo.channel('chat')
                        .listen('MessageCreated', (e) => {

                            this.getMessages(); // メッセージを再読込

                        });
                    
                }
            });
        </script>

    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Tennis Matching</title>
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
                                    <a class="dropdown-item" href="/posts/mypage">
                                        ??????????????????
                                    </a>
                                    <a class="dropdown-item" href="/posts/rooms">
                                        ??????????????????
                                    </a>
                                    <a class="dropdown-item" href="/posts/myposts">
                                        ??????????????????
                                    </a>
                                    <a class="dropdown-item" href="/posts/mypage/request_conf">
                                        ?????????????????????
                                    </a>
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
        <!-- ?????????????????????????????????????????????????????? -->
        <!-- ????????????????????????????????? -->

        <div class="page_title">
            <div class="container">
                <h1>???{{ $post->title }}????????????????????????</h1>
                <!-- ???????????????????????????????????????????????????????????????????????? -->
            </div>
        </div>

        <div class="chat-display">
            <div class="container">

                <div id="chat">
                    <!-- send????????? -->
                    <textarea v-model="message"></textarea>{{--?????????????????????data???message????????????v???model?????????--}}
                    <br>
                    <button type="button" @click="send">??????</button>

                    <!-- ????????????????????????????????? -->
                    <div v-for="message in messages">
                        <div v-if="post_id == message.post.id">
                            <span v-text="message.user.name" class="chat_name"></span>???&nbsp;
                            <span v-text="message.body" class="chat_message"></span>
                        </div>
                    </div>

                </div>
                
                <button onclick="history.back()">??????</button>

            </div>
        </div>

        <script src="/js/app.js"></script>
        <script>
            new Vue({ //Vue????????????????????????????????????????????????
                el: '#chat',???//?????????????????????,id="chat"??????????????????
                data: { //?????????????????????????????????????????????????????????html??????????????????
                    message: '',
                    post_id: parseInt('{{ $post->id }}'),
                    messages: [] //message?????????????????????messages????????????????????????????????????
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
                        const url = '/ajax/chat'; //const?????????????????????????????????
                        const params = {message: this.message, post_id: this.post_id };
                        axios.post(url, params) // ???????????????????????????????????? 
                            .then((response) => {
                                this.message = '';//this????????????data???message???????????????
                            });
                    }
                },
                mounted () {
                    
                    this.getMessages();
                    
                    Echo.channel('chat')
                        .listen('MessageCreated', (e) => {
                                this.getMessages(); // ???????????????????????????
                            });
                    
                }
            });
        </script>

    </body>
</html>
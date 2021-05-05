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
                <h1>「{{ $post->title }}」のトークルーム</h1>
            </div>

        </header>
        <div class="chat-display">
            <div class="container">

                <div id="chat">

                    <textarea v-model="message"></textarea>{{--入力された値はdataのmessageに入る、vーmodelにより--}}
                    <br>
                    <button type="button" @click="send">送信</button>

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

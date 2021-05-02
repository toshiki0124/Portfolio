<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portfolio</title>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
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
                        <span v-text="message.user.name"></span>：&nbsp;
                        <span v-text="message.body"></span>
                    </div>
                    
                </div>
                
                <button onclick="history.back()">戻る</button>
            </div>
        </div>
        <script>
            new Vue({ //Vueのインスタンス化により使用可能に
                el: '#chat',　//有効範囲の指定,id="chat"のところだけ
                data: { //データバインディング、ここにある変数をhtmlで表示できる
                    test: 'てすと',
                    message: '',
                    post_id: parseInt('{{ $post->id }}'),
                    messages: [] //messageには空文字列、messagesには空のリストを与えてる
                },
                methods: {
                    send() {
                        const url = '/ajax/chat'; //constは再定義できない変数　
                        const params = {message: this.message, post_id: this.post_id}
                        axios.post(url, params) // 第二引数に送信するデータ 
                            .then((response) => {
                                this.message = '';//thisを通してdataのmessageにアクセス
                            });
                    }
                },
                mounted () {
                    const url = '/ajax/chat';
                    axios.get(url)
                        .then((response) => {
                            this.messages = response.data;
                        });
                }
            });
        </script>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portfolio</title>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.min.js"></script>
    </head>
    <body>
        <div id="chat">
            <button type="button" @click="send()">送信</button>
            @{{ message }}
            @{{ num }}
        </div>
        <script>
            new Vue({
                el: "#chat",
                data() {
                    return {
                        message: "こんにちは",
                        num: 1
                    }
                },
                methods: {
                    send() {
                        return (this.num += 1)
                    }
                }
            });
        </script>
    </body>
</html>

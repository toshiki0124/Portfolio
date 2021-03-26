<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tennis Matching</title>
    </head>
    <body>
        <h1>都道府県の一覧表示</h1>
        @foreach ($places as $place)
                <div class='place'>
                    <h2 class='prefecture'>{{ $place->name }}</h2>
                </div>
        @endforeach
    </body>
</html>

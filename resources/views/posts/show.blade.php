<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>複数アカウントを持ちやすいSNS</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="account_id">
                {{ $post->account_id }}
        </h1>
        <div class="content">
            
            <div class="content__post">
                <p>{{ $post->body }}</p>    
            </div>
            <div class="content_timestamp">
                <p>create: {{ $post->created_at }}</p>
                <p>update: {{ $post->updated_at }}</p>
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>複数アカウントを持ちやすいSNS</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>複数アカウントを持ちやすいSNS</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <h2 class="account_id">
                {{ $post->account_id }}
                </h2>
                <div class='post'>
                    <h3 class='title'>
                        <a href="/posts/{{$post->id}}">{{$post->body}}</a>     
                    </h3>
                    <p>{{$post->created_at}}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
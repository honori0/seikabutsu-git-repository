<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>複数アカウントを持ちやすいSNS</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            複数アカウントを持ちやすいSNS
        </x-slot>
    <body>
        <h1>カテゴリー別投稿一覧</h1>
        <a href='/posts/create'>create</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <h2 class="account_id">
                {{ $post->account_id }}
                </h2>
                <div class='post'>
                    <h3 class='title'>
                        <a href="/posts/{{$post->id}}">{{$post->body}}</a>     
                    </h3>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <p>{{$post->created_at}}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        {{ Auth::user()->name }}
    </body>
    </x-app-layout>
</html>
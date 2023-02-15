<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>投稿詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            複数アカウントを持ちやすいSNS
        </x-slot>
    <body>
        <div class="content">
            
            <div class="content_account">
                <p>{{ $post->account->name}}</p>
            </div>  
            <div class="content__post">
                <p>{{ $post->body }}</p>    
            </div>
           <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
            <div class="content_timestamp">
                <p>create: {{ $post->created_at }}</p>
                <p>update: {{ $post->updated_at }}</p>
            </div>
        </div>
        <a class="bg-gray-500 hover:bg-gray-400 text-white rounded px-4 py-2" href="/posts/{{ $post->id }}/edit">edit</a>
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="bg-gray-500 hover:bg-gray-400 text-white rounded px-4 py-2" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        {{ Auth::user()->name }}
    <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
    </script>
    </body>
    </x-app-layout>
</html>
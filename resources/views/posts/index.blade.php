<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title class="text-center">投稿一覧</title>
        <!-- Fonts -->
    </head>
    <x-app-layout>
        <x-slot name="header">
           複数アカウントを持ちやすいSNS 
        </x-slot>
    <body class="bg-indigo-400">
        <h1 class="text-center font-bold text-gray-900">投稿一覧</h1>
        <div class="text-center">
            <a class="bg-gray-500 hover:bg-gray-400 text-white rounded px-4 py-2" href='/posts/create'>create</a>
            <div class="border-8 border-indigo-600 text-black">
                @foreach ($posts as $post)
                    <div class='post'>
                        <p>{{ $post->account->name }}</p>
                        <h2 class='title'>
                            <a class="border-8 border-indigo-600 text-black" href="/posts/{{$post->id}}">{{$post->body}}</a>     
                        </h2>
                        <a class='links' href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                        <p>{{$post->created_at}}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        {{ Auth::user()->name }}
    </body>
</x-app-layout>
</html>

<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>複数アカウントを持ちやすいSNS</title>
    </head>
    <x-app-layout>
        <x-slot name="header">
            複数アカウントを持ちやすいSNS
        </x-slot>
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__body'>
                <h2>本文</h2>
                <input type='text' name='post[body]' value="{{ $post->body }}">
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
    {{ Auth::user()->name }}
</body>
</x-app-layout>
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>アカウント作成</title>
    </head><x-app-layout>
        <x-slot name="header">
            複数アカウントを持ちやすいSNS
        </x-slot>
    <body>
        <h1>アカウント作成</h1>
        <form action="/accounts" method="POST">
            @csrf
            <div class="title">
                <h2>アカウント名</h2>
                <input type="text" name="account[name]" placeholder="アカウント名"/>
            </div>
            <div class="user_id">
                {{Auth::id()}}
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/accounts">戻る</a>
        </div>
    {{ Auth::user()->name }}
    </body>
    </x-app-layout>
</html>
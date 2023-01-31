<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>アカウント詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            複数アカウントを持ちやすいSNS
        </x-slot>
    <body>
        <h1 class="name">
            {{ $account->name }}
        </h1>
        <div class="user_id">
            <h3>ユーザー</h3>
            <p>{{ $account->user_id }}</p>    
        </div>
        <div class="footer">
            <a href="/accounts">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>
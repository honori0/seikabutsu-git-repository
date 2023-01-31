<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>アカウント一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            複数アカウントを持ちやすいSNS
        </x-slot>
    <body>
        <h1>アカウント一覧</h1>
        <p>現在のアカウント：{{$now_account}}</p>
        <a href='/accounts/create'>新規アカウント作成</a>
        <div class='accounts'>
            @foreach ($accounts as $account)
                <div class='account'>
                    <h2 class='name'>
                    <a href="/accounts/{{ $account->id }}">{{ $account->name }}</a>
                    </h2>
                    <form action="/accounts/{{ $account->id }}" id="form_{{ $account->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteAccount({{ $account->id }})">delete</button> 
                    </form>
                    <a href="/change/{{ $account->id }}">アカウントを選択する</a>
                    
                </div>
            @endforeach
        </div>
        
        {{ Auth::user()->name }}
    <script>
    function deleteAccount(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
                }
            
            
    
            }
    </script>
    </body>
    </x-app-layout>
</html>
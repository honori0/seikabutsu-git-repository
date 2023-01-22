<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>アカウント名一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            複数アカウントを持ちやすいSNS
        </x-slot>
    <body>
        <h1>Account Name</h1>
        <div class='accounts'>
            @foreach ($accounts as $account)
                <div class='account'>
                    <h2 class='name'>アカウント名</h2>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $accounts->links() }}
        </div>
        {{ Auth::user()->name }}
    </body>
    </x-app-layout>
</html>
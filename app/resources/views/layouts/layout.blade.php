<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Welcome to my website</title>
    @yield('stylesheet')
</head>
<!-- resources/views/auth/login.blade.php -->
<div class="col-md-6 col-xs-6 follow line" align="center">
    <h3>
        バドミントン交流アプリ <br /> <span>FOLLOWERS</span>
    </h3>
</div>
<div class="col-md-6 col-xs-6 follow line" align="center">
    <div align="center">
        <button class="btn btn-orange">新規登録</button>
    </div>
</div>
<div class="my-navbar-control">
    @if(Auth::check())
    <span class="my-navbar-item">{{ Auth::user()->name }}</span>
    /
    <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <script>
        document.getElementById('logout').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        });
    </script>
    @else
    <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
    /
    <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
    @endif
</div>
@yield('content')
</div>
@yield('content')
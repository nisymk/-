<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/adminHome.css') }}">

    <title>Welcome to my website</title>
</head>

<body>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>

    <div class="container">
        <!-- 共通のヘッダー -->
        <div class="header">
            <div>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h2> バドミントン交流アプリ</h2>
                </a>
            </div>
            <!-- ログインユーザーのアイコン表示 -->
            <a href="{{ route('user_info.index') }}">
                @if(Auth::user()->userinfo != null && Auth::user()->userinfo->images != null)
                <img src="{{ asset('storage/usersimages/'.Auth::user()->userinfo->images) }} " width="100" height="100">
                @else
                <img src="{{ asset('defalticon.png') }} " width="100" height="100">
                @endif
            </a>
            <div>
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
                @endif
            </div>
        </div>
        @yield('content')
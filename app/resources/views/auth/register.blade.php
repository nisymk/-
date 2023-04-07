<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>

    </style>
</head>
<!-- resources/views/auth/register.blade.php -->

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="container">
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
    </div>
    </body>
    <div>
        <label for="name">{{ __('Name') }}</label>
        <div>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        </div>
    </div>
    <div>
        <label for="email">{{ __('Email') }}</label>
        <div>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>
    </div>
    <div>
        <label for="password">{{ __('Password') }}</label>
        <div>
            <input id="password" type="password" name="password" required autocomplete="new-password">
        </div>
    </div>
    <div>
        <label for="password-confirm">{{ __('Confirm Password') }}</label>
        <div>
            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>
    <div>
        <div>
            <button type="submit">
                {{ __('Register') }}
            </button>
        </div>
    </div>

    <body>
</form>


</html>
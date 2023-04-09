@extends('layouts.layout')
@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf

    <body>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>

        <div class="container">
            <div class="row login_box">
                <div class="col-md-12 col-xs-12" align="center">
                    <div class="line">
                        <h3>12 : 30 AM</h3>
                    </div>
                    <div class="outter"><img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="image-circle" /></div>
                    <h1>Hi Guest</h1>
                    <span>INDIAN</span>
                </div>
                <div class="col-md-6 col-xs-6 follow line" align="center">
                    <h3>
                        125651 <br /> <span>FOLLOWERS</span>
                    </h3>
                </div>
                <div class="col-md-6 col-xs-6 follow line" align="center">
                    <h3>
                        125651 <br /> <span>FOLLOWERS</span>
                    </h3>
                </div>
                <div class="col-md-12 col-xs-12 login_control">
                    <label for="email">{{ __('Email') }}</label>

                    <div class="control">
                        <div class="label">Email Address</div>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="control">
                        <label class="label" for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" class="form-control" value="123456" required autocomplete="current-password">
                    </div>
                    <div>
                        <div>
                            <div>
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="control">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                    <div align="center">
                        <button class="btn btn-orange" type="submit">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</form>
@endsection

</html>
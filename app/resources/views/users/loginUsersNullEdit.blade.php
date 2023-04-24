<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>バドミントン交流アプリ</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/adminHome.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="js/bootstrap.min.js"></script>
    <script src="{{ asset('js/ajaxlike.js') }}" defer></script>
    <script src="{{ asset('js/ajaxevent.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- ダウンロードデザイン -->
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="./assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/demo/demo.css" rel="stylesheet" />


    <title>バドミントン交流アプリ</title>
</head>

<body class="jisaku-haikei">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>

    <div>
        <!--  -->
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container">
                <div class="navbar-translate">
                    <a class="navbar-brand" href="">
                        <div class="text-left" style="font-size:23px">
                            バドミントン交流アプリ
                        </div>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="text-right">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="#pablo" class="nav-link"><i class="material-icons">email</i></a>
                        </li>
                        <li class="nav-item">
                            <a href="" class=" nav-link"><i class="material-icons">face</i></a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="#pablo" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="material-icons">settings</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <h6 class="dropdown-header">Dropdown header</h6>
                                <div>
                                    @if(Auth::check())
                                    <!-- <span class="my-navbar-item">{{ Auth::user()->name }}</span> -->
                                    <a href="#" id="logout" class="dropdown-item">ログアウト</a>
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
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                <a href="#pablo" class="dropdown-item">Another action</a>
                                <a href="#pablo" class="dropdown-item">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a href="#pablo" class="dropdown-item">Separated link</a>
                                <div class="dropdown-divider"></div>
                                <a href="#pablo" class="dropdown-item">One more separated link</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <div class="create-items">
            <div class="panel-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="form">
                <form action="{{ route('user_info.update', Auth::id()) }}" method="POST" enctype="multipart/form-data" style="height: 60rem;">
                    @csrf
                    @method('PUT')
                    <div class="create-items form-group">
                        <div class="d-flex justify-content-around">
                            <div class="" style="width: 45rem; height: 80rem;">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center">
                                        <div class="d-block mx-auto">
                                            @if($user_info !=null && $user_info->images != null)
                                            <img src="{{ asset('storage/usersimages/'.$user_info['images']) }}" width="100" height="100">
                                            @else
                                            <img src="{{ asset('defalticon.png') }} " width="100" height="100">
                                            @endif
                                        </div>
                                        <div class="input-form">
                                            <span class="btn btn-primary d-block mx-auto mt-2">
                                                <label for="images">画像を選択</label>
                                                <input type="file" style="display:none" name="images" id="images" class="form-control">
                                            </span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="input-form">
                                            <label for="name" class="text-dark">ユーザー名</label>
                                            <input name="name" class="form-control text-dark" id="name" value="{{ old('name', Auth::user()->name) }}" placeholder="ユーザー名">
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="input-form">
                                            <label for="age" class="text-dark">年齢</label>
                                            <input name="age" id="age" class="form-control text-dark" placeholder="年齢" value="{{ old('age', $user_info ? $user_info['age'] : '') }}">
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="input-form">
                                            <label for="prefecture" class="text-dark">出身県</label>
                                            <input name="prefecture" id="prefecture" class="form-control text-dark" value="{{ old('prefecture', $user_info ? $user_info['prefecture'] : '') }}" placeholder="出身県">
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="input-form" class="text-dark">
                                            <label for="sports" class="text-dark">スポーツ歴</label>
                                            <textarea name="sports" id="sports" class="text-dark form-control" placeholder="スポーツ歴">{{ old('sports', $user_info ? $user_info['sports'] : '') }}</textarea>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="input-form">
                                            <label for="exampleFormControlTextarea1 comment" class="text-dark">自己紹介</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" class="text-dark" name="comment" id="comment" placeholder="自己紹介">{{ old('comment', $user_info ? $user_info['comment']: '') }}</textarea>
                                        </div>
                                    </li>
                                    <li class="input-form text-dark list-group-item text-center">
                                        <input type="submit" class="btn btn-primary mb-4" value="保存">
                                        <!-- <a href="/">ホームへ戻る</a> -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
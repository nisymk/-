@extends('layouts.app')
@section('content')

<body>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>

    <div class="container">
        <!-- 共通のヘッダー -->
        <!-- <div class="header">
            <div>
                <h3>
                    管理者ホーム <br /> <span>FOLLOWERS</span>
                </h3>
            </div>
            <div class="box2">
                <div>
                    @if(Auth::check())
                    <span class="my-navbar-item">{{Auth::user()->name}}</span>
                    /
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div> -->

        <!-- 検索 -->
        <div class="form">
            <div>
                <button class="btn">検索</button>
            </div>
            <!-- 管理者お知らせ作成、編集 -->
            <div>
                <div>
                    <a href="{{ route('news.create') }}"><button class="btn">お知らせ作成</button></a>
                </div>
                <div>
                    <button class="btn">お知らせ編集</button>
                </div>
            </div>
        </div>
        <!-- 情報一覧 -->
        <div class="info-list">
            <div class="list col-md-5"><!-- ユーザー一覧 -->
                <p class="list-title">ユーザー 一覧</p>
                <div class="user-list">
                    <div class="box2"></div>
                    <div>
                        @foreach($posts as $post)
                        <tr>
                            <th scope="col">
                                <a href="">#</a>
                            </th>
                            <th scope='col'>{{ $post['comment'] }}</th>
                            <th scope="col">
                                <a href="">削除</a>
                            </th>
                        </tr>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="list col-md-6">
                <p class="list-title">投稿記事一覧</p>
                <div class="post-list"><!-- 投稿記事一覧 -->
                    <div class="post-list-column">
                        <a href="">ユーザー名</a>
                        <div>
                            @foreach($posts as $post)
                            <tr>
                                <th scope="col">
                                    <a href="">#</a>
                                </th>
                                <th scope='col'>{{ $post['title'] }}</th>
                                <th scope="col">
                                    <a href="">投稿記事タイトル</a>
                                </th>
                                <th scope="col">
                                    <a href="">削除</a>
                                </th>
                            </tr>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <div class="box2"></div>
                    </div>
                </div>
            </div>
        </div>
</body>
@endsection


</html>
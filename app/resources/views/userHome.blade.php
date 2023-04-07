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
                <h3>
                    バドミントン交流アプリ <br /> <span>FOLLOWERS</span>
                </h3>
            </div>
            <div class="box2"></div>
            <div>
                <div>
                    <button class="btn">ログアウト</button>
                </div>
            </div>
        </div>

        <body>
            <!-- 検索 -->
            <div class="form">
                <div>
                    <button class="btn">検索</button>
                </div>
                <!-- 管理者お知らせ作成、編集 -->
                <div>
                    <div>
                        <button class="btn">お知らせ作成</button>
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
                            <p>投稿内容</p>
                        </div>
                        <a href="">削除</a>
                    </div>
                </div>
                <div class="list col-md-6">
                    <p class="list-title">投稿記事一覧</p>
                    <div class="post-list"><!-- 投稿記事一覧 -->
                        <div class="post-list-column">
                            <a href="">ユーザー名</a>
                            <a href="">　投稿記事タイトル</a>
                        </div>
                        <div>
                            <div class="box2"></div>
                            <div>
                                <p>投稿内容</p>
                            </div>
                            <a href="">削除</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>
</body>

</html>
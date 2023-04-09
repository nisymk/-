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

<body>
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

    <div class="post-create-box">
        <div>
            <div class="img">画像</div>
            <div class="title">タイトル</div>
            <div class="message">投稿内容</div>
        </div>
        <div><a href="">投稿する</a></div>
    </div>
</body>

</html>
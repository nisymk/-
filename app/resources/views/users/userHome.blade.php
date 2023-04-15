@extends('layouts.layout')

@section('content')

<body>
    <!-- 検索 -->
    <div class="form">
        <!-- <div>
            <button class="btn">検索</button>
        </div> -->
        <!-- 管理者お知らせ作成、編集 -->
        <div class="container bg-light">
            <div class="text-right">
                <a href="{{ route('post.create') }}">
                    <button type="button" class="btn btn-outline-dark">投稿作成</button>
                </a>
                <a href="{{ route('post.index') }}">
                    <button type="button" class="btn btn-outline-dark">投稿一覧画面へ</button>
                </a>
            </div>
        </div>
    </div>

    <!-- 情報一覧 -->
    <div class="text-center">
        <img src="{{ asset('storage/adminimages/5183ef65b82a66cf573f324e59cf028b.jpeg') }} " width="900" height="400">
    </div>
    <div class="info-list">
        <div class="list col-md-6">
            <p class="">お知らせ一覧</p>
            <div class=""><!-- 投稿記事一覧 -->
                <div class="">
                    <a href="">お知らせタイトル</a>
                </div>
                <div>
                    <div>
                        <p>お知らせ内容</p>
                    </div>
                    <div>
                        @foreach($news as $new)
                        <div class="container">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image">
                                            <title>Placeholder</title>
                                            <rect fill="#868e96" width="100%" height="100%" /><text fill="#dee2e6" dy=".3em" x="50%" y="50%"><img src="{{ asset('storage/adminimages/'.$new['images']) }} " width="100" height="100"></text>
                                        </svg>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <p class="card-text">{{ $new['title'] }}</p>
                                            <p class="card-text">{{ $new['comment'] }}</p>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
</body>
</body>
@endsection

</html>
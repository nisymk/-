@extends('layouts.layout')

@section('content')

<body>
    <!-- 検索 -->
    <div class="form">
        <div>
            <button class="btn">検索</button>
        </div>
        <!-- 管理者お知らせ作成、編集 -->
        <div>
            <div>
                <a href="{{ route('post.create') }}"><button class="btn">投稿作成</button></a>
            </div>
            <div>
                <a href="{{ route('post.index') }}"><button class="btn">投稿一覧画面へ</button></a>
            </div>
        </div>
    </div>
    <img src="{{ asset('storage/adminimages/5183ef65b82a66cf573f324e59cf028b.jpeg') }} " width="900" height="400">

    <!-- 情報一覧 -->
    <div class="info-list">
        <div class="list col-md-6">
            <p class="list-title">お知らせ一覧</p>
            <div class="post-list"><!-- 投稿記事一覧 -->
                <div class="post-list-column">
                    <a href="">お知らせタイトル</a>
                </div>
                <div>
                    <div>
                        <p>お知らせ内容</p>
                    </div>
                    <div>
                        @foreach($news as $new)
                        <tr>
                            <img src="{{ asset('storage/adminimages/'.$new['images']) }} " width="100" height="100">
                            <th scope="col">
                                <a href="">{{ $new['title'] }}</a>
                            </th>
                            <th scope='col'>{{ $new['comment'] }}</th>
                        </tr>
                        <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</body>
@endsection

</html>
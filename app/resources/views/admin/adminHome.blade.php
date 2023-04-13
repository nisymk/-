@extends('layouts.layout')
@section('content')

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
                    <a href="{{ route('news.index') }}"><button class="btn">お知らせ一覧画面へ</button></a>
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
                                <a href="">{{ $post['title'] }}</a>
                            </th>
                            <th scope='col'>{{ $post['comment'] }}</th>
                            <th scope="col">
                                <a href="">削除</a>
                            </th>
                        </tr>
                        <br>
                        @endforeach
                    </div>
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
                                <a href="">
                            <th scope='col'>{{ $post['title']}}</th>
                            </a>
                            </th>
                            <th scope='col'>{{ $post['comment']}}</th>
                            <th scope="col">
                                <form action="{{ route('post.destroy', $post['id']) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">削除</button>
                                </form>
                            </th>
                        </tr>
                        <br>
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
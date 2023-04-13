@extends('layouts.layout')
@section('content')

<div class="list col-md-6">
    <p class="list-title">投稿記事一覧</p>
    <div class="post-list"><!-- 投稿記事一覧 -->
        <div class="post-list-column">
            <a href="">ユーザー名</a>
            <form method="GET" action="{{ route('post.index') }}">
                @csrf
                <input type="search" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
                <div>
                    <button type="submit">検索</button>
                </div>
            </form>
            <div>
                <img src="{{ $loginuser_info['images'] }}" width="100" height="100">
                <th scope='col'>{{ $loginuser_info['user']['name'] }}</th>
            </div>
            <div>
                <tr>
                    <th scope='col'>{{ $loginuser_info['age'] }}</th>
                    <th scope='col'>{{ $loginuser_info['comment'] }}</th>
                </tr>
            </div>
            <div>
                <th scope="col">
                    <a href="{{ route('user_info.edit', $users['id']) }}">
                        ユーザー情報編集
                    </a>
                </th>
                <div>
                    <a href="{{ route('post.index') }}"><button class="btn">投稿一覧画面へ</button></a>
                </div>
            </div>
            <div>
                <div>
                    <p>お気に入りのお知らせ</p>
                </div>
                @foreach($news as $new)
                <tr>
                    <th scope="col">
                        <a href="">
                            <img src="{{ asset('storage/adminimages/'.$new['images']) }} " width="100" height="100">
                        </a>
                    </th>
                    <th scope='col'>{{ $new['name'] }}</th>
                    <th scope='col'>{{ $new['title'] }}</th>
                    <th scope='col'>{{ $new['comment'] }}</th>
                </tr>
                <br>
                @endforeach
            </div>
            <div>
                <div>
                    <p>参加予定イベント</p>
                </div>
                @foreach($posts as $post)
                <tr>
                    <th scope="col">
                        <a href="">
                            <img src="{{ asset('storage/adminimages/'.$new['images']) }} " width="100" height="100">
                        </a>
                    </th>
                    <th scope='col'>{{ $post['name']}}</th>
                    <th scope='col'>{{ $post['title']}}</th>
                    <th scope='col'>{{ $post['comment']}}</th>
                </tr>
                <br>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
</body>
@endsection

</html>
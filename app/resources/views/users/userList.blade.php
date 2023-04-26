@extends('layouts.layout')
@section('content')

<div class="list col-md-6">
    <p class="list-title">投稿記事一覧</p>
    <div class="post-list"><!-- 投稿記事一覧 -->
        <div class="post-list-column">
            <a href="">ユーザー名</a>
                <img src="{{ $userlists['images'] }}" width="100" height="100">
                <th scope='col'>{{ $userlists['user']['name'] }}</th>
            </div>
            <div>
                <tr>
                    <th scope='col'>{{ $userlists['age'] }}</th>
                    <th scope='col'>{{ $userlists['comment'] }}</th>
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
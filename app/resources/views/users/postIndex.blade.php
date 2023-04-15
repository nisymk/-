@extends('layouts.layout')
@section('content')
<div class="container">

    <div class="list col-md-6">
        <p class="list-title">投稿記事一覧</p>
        <div>
            <a class="navbar-brand" href="{{ url('/') }}">
                ホーム画面に戻る
            </a>
        </div>
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
                    @foreach($posts as $post)
                    <tr>
                        <a href="{{ route('user_info.show', $post['user_id']) }}">
                            <img src="{{ asset('storage/usersimages/'.$post['images']) }} " width="100" height="100">
                        </a>
                        <th scope='col'>{{ $post['name']}}</th>
                        <th scope='col'>{{ $post['title']}}</th>
                        <th scope="col">
                            <a href="">
                            </a>
                        </th>
                        <th scope='col'>{{ $post['comment']}}</th>
                        @if(Auth::id() === $post['user_id'])
                        <th scope="col">
                            <a href="{{ route('post.edit', $post['id']) }}">
                                編集
                            </a>
                            <form action="{{ route('post.destroy', $post['id']) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit">削除</button>
                            </form>
                        </th>
                        @endif
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
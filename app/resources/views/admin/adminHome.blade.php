@extends('layouts.layout')
@section('content')

<!-- 検索 -->
<div class="form">
    <!-- <div>
        <button class="btn">検索</button>
    </div>
    <form method="GET" action="{{ route('post.index') }}" class="form-inline ml-auto">
        @csrf
        <div class="form-group has-white bmd-form-group">
            <input type="search" placeholder="Search" name="search" class="form-control" value="@if (isset($search)) {{ $search }} @endif">
        </div>
        <div>
            <button type="submit" class="btn btn-white btn-raised btn-fab btn-round">
                <i class="material-icons">search</i>
            </button>
        </div>
    </form> -->
    <!-- 管理者お知らせ作成、編集 -->
    <div>
        <div>
            <a href="{{ route('news.create') }}"><button class="btn btn-primary">お知らせ作成</button></a>
        </div>
        <div>
            <a href="{{ route('news.index') }}"><button class="btn btn-primary mt-1">お知らせ一覧画面へ</button></a>
        </div>
    </div>
</div>
<!-- 情報一覧 -->
<div class="d-flex justify-content-center mr-5 mb-4 mt-3">
    <div>
        <!-- ユーザー一覧 -->
        <div>
            <p class="h4">ユーザー 一覧</p>
        </div>
        @foreach($userinfos as $userinfo)
        @if ($userinfo['role'] != 0)
        <tr>
            <div class="card d-flex flex-row bd-highlight mb-3" style="width: 50rem;">
                <div class="">
                    @if (isset($userinfo['images']))
                    <a href="">
                        <img src="{{ asset('storage/usersimages/'.$userinfo['images']) }} " width="100" height="100">
                        @else
                        <img src="{{ asset('defalticon.png') }}" width="100" height="100">
                        @endif </a>
                </div>
                <div>
                    <p class="text-dark" style="width: 30rem;">{{ $userinfo['name'] }}</p>
                    <p class="text-dark" style="width: 30rem;">{{ $userinfo['email'] }}</p>
                </div>
                <form action="{{ route('home.destroy', $userinfo['user_id']) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </div>
        </tr>
        <br>
        @endif
        @endforeach
    </div>
    <div class="ml-5 mb-4">
        <div>
            <p class="h4">投稿記事一覧</p>
        </div>
        @foreach($posts as $post)
        <tr>
            <div class="card d-flex flex-row bd-highlight mb-3">
                <div>
                    <p class="text-dark" style="width: 40rem;">{{ $post['title']}}</p>
                    <p class="text-dark" style="width: 40rem;">{{ $post['comment']}}</p>
                </div>
                <form action="{{ route('post.destroy', $post['id']) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </div>
        </tr>
        <br>
        @endforeach
    </div>
</div>


</body>
@endsection

</html>
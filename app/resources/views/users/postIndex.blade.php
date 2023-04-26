@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="navigation-example" style="background-image: url('./assets/img//bg.jpg');">
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container justify-content-between">
                <div class="navbar-translate">
                    <a class="navbar-brand text-light h3" href="{{ url('/') }}">ホーム画面に戻る</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a href="{{ route('post.create') }}" class="nav-link h3">つぶやき作成</a>
                        </li>
                    </ul>
                    <form method="GET" action="{{ route('post.index') }}" class="form-inline ml-auto d-flex justify-content-center h3">
                        @csrf
                        <div class="form-group has-white bmd-form-group">
                            <input type="search" placeholder="Search" name="search" class="form-control" value="@if (isset($search)) {{ $search }} @endif">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-white btn-raised btn-fab btn-round">
                                <i class="material-icons">search</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <div class="post-list d-flex justify-content-center"><!-- 投稿記事一覧 -->
        <div class="post-list-column">
            <div>
                @foreach($posts as $post)
                <div class="card d-flex flex-row bd-highlight mb-3" style="width: 60rem;">
                    <div class="mr-5 mt-3">
                        @if($post != null && $post->images != null)
                        <p class="text-dark"><img src="{{ asset('storage/usersimages/'.$post['images']) }}" width="150" height="150">
                        </p>
                        @else
                        <p class="text-dark"><img src="{{ asset('defobado.png') }}" width="170" height="150">
                        </p>
                        @endif
                    </div>
                    <div class="ml-5">
                        <div>
                            <a href="{{ route('user_info.show', $post['user_id']) }}" >
                                <p class="text-primary">ユーザー名：{{ $post['name'] }}</p>
                            </a>
                            <p class="text-dark">タイトル：{{ $post['title'] }}</p>
                            <p class="text-dark">{{ $post['comment'] }}</p>
                        </div>
                        @if(Auth::id() === $post['user_id'])
                        <div class="">
                            <div class="row">
                                <div class="col-4">
                                    <a href="{{ route('post.edit', $post['id']) }}">
                                        <button type="" class="btn btn-primary">編集</button>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <form action="{{ route('post.destroy', $post['id']) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">削除</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <br>
                @endforeach
            </div>
        </div>
    </div>
</div>
</body>
@endsection

</html>
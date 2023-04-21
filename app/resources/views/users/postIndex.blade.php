@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="navigation-example" style="background-image: url('./assets/img//bg.jpg');">
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container justify-content-between">
                <div class="navbar-translate">
                    <a class="navbar-brand " href="{{ url('/') }}">ホーム画面に戻る</a>
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
                            <a href="{{ route('post.create') }}" class="nav-link">投稿作成</a>
                        </li>
                    </ul>
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
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <div class="post-list"><!-- 投稿記事一覧 -->
        <div class="post-list-column">
            <div>
                <!-- @foreach($user_infos as $user_info)
                <tr>
                    <div>
                        @if($user_info != null && $user_info['images'] != null)
                        <a href="{{ route('user_info.show', $user_info['user_id']) }}">
                            <img src="{{ asset('storage/usersimages/'.$user_info['images']) }} " width="100" height="100">
                        </a>
                        @else
                        <a href="{{ route('user_info.show', $user_info['user_id']) }}">
                            <img src="{{ asset('defalticon.png') }} " width="100" height="100">
                        </a>
                        @endif
                    </div>
                    @endforeach
                </tr> -->
                @foreach($posts as $post)
                <div class="card d-flex flex-row bd-highlight mb-3" style="width: 100rem;">
                    <div class="card-body">
                        @if($post != null && $post->images != null)
                        <p class="text-dark">投稿画像： <img src="{{ asset('storage/usersimages/'.$post['images']) }}" width="100" height="100">
                        </p>
                        @else
                        <p class="text-dark">投稿画像： <img src="{{ asset('defobado.png') }}" width="100" height="100">
                        </p>
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('user_info.show', $user_info['user_id']) }}">
                            <p class="text-dark">ユーザー名：{{ $post['name']}}</p>
                        </a>
                        <p class="text-dark">投稿タイトル：{{ $post['title']}}</p>
                        <p class="text-dark">投稿内容： {{ $post['comment']}}</p>
                        @if(Auth::id() === $post['user_id'])
                        <th scope="col">
                            <a href="{{ route('post.edit', $post['id']) }}">
                                編集
                            </a>
                            <form action="{{ route('post.destroy', $post['id']) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-dark">削除</button>
                            </form>
                        </th>
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
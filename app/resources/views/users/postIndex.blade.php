@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="navigation-example" style="background-image: url('./assets/img//bg.jpg');">
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container">
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
                <tr>
                    <th scope='col'>
                        @if($post != null && $post->images != null)
                        <p>投稿画像： <img src="{{ asset('storage/usersimages/'.$post['images']) }} " width="100" height="100">
                        </p>
                        @endif
                    </th>
                    <th scope='col'>
                        <p>ユーザー名：{{ $post['name']}}</p>
                    </th>
                    <th scope='col'>
                        <p>投稿タイトル：{{ $post['title']}}</p>
                    </th>
                    <th scope='col'>
                        <p>投稿内容： {{ $post['comment']}}
                        </p>
                    </th>
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

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="" alt="...">
                    </div>
                    <div class="col-md-8">
                        <!-- <div class="card-body"> -->
                            <!-- <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                            <div class="card" style="width: 45rem;">
                                <div class="card-header">
                                    Featured
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">An item</li>
                                    <li class="list-group-item">A second item</li>
                                    <li class="list-group-item">A third item</li>
                                </ul>
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
@endsection

</html>
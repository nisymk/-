@extends('layouts.layout')
@section('content')

<div class="list col-md-6">
    <p class="list-title">投稿記事一覧</p>
    <div class="post-list"><!-- 投稿記事一覧 -->
        <div class="post-list-column">
            <form method="GET" action="{{ route('post.index') }}">
                @csrf
                <!-- <input type="search" placeholder="" name="search" value="@if (isset($search)) {{ $search }} @endif">
                <div>
                    <button type="submit">検索</button>
                </div> -->
            </form>
            <div>
                @if($loginuser_info != null && $loginuser_info->images != null)
                <img src="{{ asset('storage/usersimages/'.$loginuser_info['images']) }}" width="100" height="100">
                @else
                <img src="{{ asset('defalticon.png') }} " width="100" height="100">
                @endif
                <div scope='col'>{{ $loginuser_info ? Auth::user()->name : '' }}</div>
            </div>
            <div>
                <tr>
                    <th scope='col'>{{ $loginuser_info ? $loginuser_info['age'] : '' }}</th>
                    <th scope='col'>{{ $loginuser_info ? $loginuser_info['comment'] : '' }}</th>
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
            <div class="d-flex justify-content-between">
                <div>
                    <div>
                        <p>お気に入りのお知らせ</p>
                    </div>
                    @foreach($favorites as $favorite)
                    <tr>
                        @if ($favorite['user_id'] == Auth::id())
                        <th scope="col">
                            <a href="">
                                <img src="{{ asset('storage/adminimages/'.$favorite->news->images) }} " width="100" height="100">
                            </a>
                        </th>
                        <th scope='col'>{{ $favorite->news->name }}</th>
                        <th scope='col'>{{ $favorite->news->title }}</th>
                        <th scope='col'>{{ $favorite->news->comment }}</th>
                        @endif
                    </tr>
                    <br>
                    @endforeach
                </div>
                <div>
                    <div>
                        <p>参加予定イベント</p>
                    </div>
                    @foreach($events as $event)
                    <tr>
                        @if ($event['user_id'] == Auth::id())
                        <th scope="col">
                            <a href="">
                                <img src="{{ asset('storage/adminimages/'.$event->eventnews->images) }} " width="100" height="100">
                            </a>
                        </th>
                        <th scope='col'>{{ $event->eventnews->name }}</th>
                        <th scope='col'>{{ $event->eventnews->title }}</th>
                        <th scope='col'>{{ $event->eventnews->comment }}</th>
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

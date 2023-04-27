@extends('layouts.layout')
@section('content')

<div class="list">
    <div class="post-list">
        <div class="post-list-column">
            <form method="GET" action="{{ route('post.index') }}">
                @csrf
            </form>
            <div class="d-flex justify-content-center">
                <div class="mr-2 card" style="height: 152px;">
                    @if($loginuser_info != null && $loginuser_info->images != null)
                    <img src="{{ asset('storage/usersimages/'.$loginuser_info['images']) }}" width="150" height="150">
                    @else
                    <img src="{{ asset('defalticon.png') }}" width="150" height="150">
                    @endif
                </div>
                <div>
                    <ul class="list-group">
                        <li class="list-group-item text-dark">名前：{{ $users['name'] }}</li>
                        <li class="list-group-item text-dark">年齢：{{ $loginuser_info['age']}}歳</li>
                        <li class="list-group-item text-dark">出身県：{{ $loginuser_info['prefecture']}}</li>
                        <li class="list-group-item text-dark">スポーツ歴：{{ $loginuser_info['sports']}}</li>
                        <li class="list-group-item text-dark">自己紹介：{{ $loginuser_info['comment']}}</li>
                    </ul>
                    <div scope="col">
                        <a href="{{ route('user_info.edit', $users['id']) }}">
                            <button type="button" class="btn btn-primary mx-auto d-block"> ユーザー情報編集</button>
                        </a>
                        <a href="{{ route('post.index') }}">
                            <button type="button" class="btn btn-secondary mx-auto d-block mt-2">投稿一覧画面へ</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mr-5 mb-4 mt-3">
                <div>
                    <div>
                        <p class="h4">お気に入りのお知らせ</p>
                    </div>
                    @foreach($favorites as $favorite)
                    <tr>
                        @if ($favorite['user_id'] == Auth::id())
                        <div class="card d-flex flex-row bd-highlight mb-3" style="width: 50rem;">
                            <div class="">
                                <a href="">
                                    <img src="{{ asset('storage/adminimages/'.$favorite['images']) }} " width="100" height="100">
                                </a>
                            </div>
                            <div>
                                <p class="text-dark">{{ $favorite['name'] }}</p>
                                <p class="text-dark">{{ $favorite['title']}}</p>
                                <p class="text-dark d-block text-truncate" style="max-width:420px;">{{ $favorite['comment'] }}</p>
                            </div>
                        </div>
                        @endif
                    </tr>
                    <br>
                    @endforeach
                </div>

                <div class=" ml-5 mb-4">
                    <div>
                        <p class="h4">参加予定イベント</p>
                    </div>

                    @foreach($events as $event)
                    <tr>
                        @if ($event['user_id'] == Auth::id())
                        <div class="card d-flex flex-row bd-highlight mb-3" style="width: 50rem;">
                            <div class="">
                                <a href="">
                                    <img src="{{ asset('storage/adminimages/'.$event['images']) }} " width="100" height="100">
                                </a>
                            </div>
                            <div>
                                <p class="text-dark">{{ $event['name'] }}</p>
                                <p class="text-dark">{{ $event['title'] }}</p>
                                <p class="text-dark d-block text-truncate" style="max-width:420px;">{{ $event['comment'] }}</p>
                            </div>
                        </div>
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
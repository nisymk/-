@extends('layouts.layout')
@section('content')
<div class="create-items">
    <div class="d-flex justify-content-around">
        <div class="">
            @if($user->userinfo->images != null)
            <img src="{{ asset('storage/usersimages/'.$user->userinfo->images) }}" width="100" height="100">
            @else
            <img src="{{ asset('defalticon.png') }} " width="100" height="100">
            @endif
            <div>
                {{ $user->name }}
            </div>
        </div>
        <div>
            <a href="/">ホーム画面へ戻る</a>
        </div>
        <div>
            <ul class="list-group">
                <li class="list-group-item">出身県　{{ $user->userinfo->prefecture }}</li>
                <li class="list-group-item">スポーツ歴　{{$user->userinfo->sports }}</li>
                <li class="list-group-item">自己紹介　{{$user->userinfo->comment }}</li>
            </ul>
        </div>
    </div>
    <div>
        @foreach($news as $new)
        <div class="container">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/adminimages/'.$new['images']) }} " width="100" height="100">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text">{{ $new['title'] }}</p>
                            <p class="card-text">{{ $new['comment'] }}</p>
                        </div>
                        <!-- 参加するイベントの表示をする -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
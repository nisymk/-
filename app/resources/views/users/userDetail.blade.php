@extends('layouts.layout')
@section('content')
<div class="create-items">
    <div class="d-flex justify-content-center">
        <div class="mr-2 card" style="height: 152px;">
            @if($user->userinfo->images != null)
            <img src="{{ asset('storage/usersimages/'.$user->userinfo->images) }}" width="150" height="150">
            @else
            <img src="{{ asset('defalticon.png') }} " width="100" height="100">
            @endif
        </div>
        <div>
            <ul class="list-group">
                <li class="list-group-item text-dark">名前　{{ $user->name}}</li>
                <li class="list-group-item text-dark">年齢　{{ $user->userinfo->age }}歳</li>
                <li class="list-group-item text-dark">出身県　{{ $user->userinfo->prefecture }}</li>
                <li class="list-group-item text-dark">スポーツ歴　{{$user->userinfo->sports }}</li>
                <li class="list-group-item text-dark">自己紹介　{{$user->userinfo->comment }}</li>
            </ul>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="post-list-column">
            <div class="card mb-4 h4" style="width: 15rem;">
                <p class="text-dark">参加予定イベント</p>
            </div>
            @foreach($events as $event)
            @if ($event['user_id'] == $id)
            <div class="card flex-row bd-highlight mb-3" style="width: 70rem;">
                <div class="">
                    <a href="">
                        <img src="{{ asset('storage/adminimages/'.$event->images) }} " width="100" height="100">
                    </a>
                </div>
                <div>
                    <p class="text-dark">お知らせタイトル：{{ $event->title }}</p>
                    <p class="text-dark">お知らせ内容： {{ $event->comment }}</p>
                </div>
            </div>
            <br>
            @endif
            <br>
            @endforeach
        </div>
    </div>
</div>
@endsection
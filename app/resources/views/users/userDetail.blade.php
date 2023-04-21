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
@endsection
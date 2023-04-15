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
                        <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image">
                            <title>Placeholder</title>
                            <rect fill="#868e96" width="100%" height="100%" /><text fill="#dee2e6" dy=".3em" x="50%" y="50%"><img src="{{ asset('storage/adminimages/'.$new['images']) }} " width="100" height="100"></text>
                        </svg>
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
        @endforeach
    </div>
</div>
@endsection
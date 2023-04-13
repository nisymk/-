@extends('layouts.layout')
@section('content')
<div class="create-items">
    <div class="form">
        {{ $user_info !== "" ? $user_info : null }}
        <form action="{{ route('user_info.update', Auth::id()) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-form">
                @if($user_info !=null && $user_info->images != null)
                <img src="{{ asset('storage/usersimages/'.$user_info['images']) }}" width="100" height="100">
                @else
                <img src="{{ asset('defalticon.png') }} " width="100" height="100">
                @endif
                <label for="images">アイコン画像</label>
                <input type="file" name="images">
            </div>
            <div class="input-form">
                <label for="name">ユーザー名</label>
                <input name="name" value="{{ old('name', Auth::user()->name) }}">
            </div>
            <div class="input-form">
                <label for="prefecture">出身県</label>
                <input name="prefecture" value="{{ old('prefecture', $user_info ? $user_info['prefecture'] : '') }}">
            </div>
            <div class="input-form">
                <label for="sports">スポーツ歴</label>
                <textarea name="sports">{{ old('sports', $user_info ? $user_info['sports'] : '') }}</textarea>
            </div>
            <div class="input-form">
                <label for="comment">自己紹介</label>
                <textarea name="comment">{{ old('comment', $user_info ? $user_info['comment']: '') }}</textarea>
            </div>
            <div class="input-form">
                <input type="submit" value="保存">
            </div>
        </form>
    </div>
</div>
@endsection
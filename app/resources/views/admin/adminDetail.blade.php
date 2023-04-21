@extends('layouts.layout')
@section('content')
<form action="{{ route('user_info.update', Auth::id()) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form">
        <div class="create-items">
            <div class="d-flex justify-content-around">
                <div class="input-form">
                    @if(Auth::user()->userinfo != null && Auth::user()->userinfo->images != null)
                    <label for="images">画像</label>
                    <img src="{{ asset('storage/adminimages/'.$users->userinfo->images) }}" width="100" height="100">
                    @else
                    <label for="images">画像</label>
                    <img src="{{ asset('defalticon.png') }} " width="100" height="100">
                    @endif
                    <input type="file" name="images" id="images">
                </div>
                <div class="input-form">
                    <label for="name">ユーザー名</label>
                    <input name="name" value="{{ old('name', Auth::user()->name) }}">
                </div>
                <div class="input-form">
                    <input type="submit" value="Submit">
                </div>
                <div>
                    <a href="/">ホーム画面へ戻る</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
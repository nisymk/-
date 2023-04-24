@extends('layouts.layout')
@section('content')
<div class="create-items">
    <div class="panel-body">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="form">
        <form action="{{ route('user_info.update', Auth::id()) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="create-items form-group">
                <div class="d-flex justify-content-around">
                    <div class="card" style="width: 45rem; height: 10rem;">
                        <div class="card-header bg-primary">
                            ユーザー情報編集フォーム
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center">
                                <div class="input-form">
                                    @if($user_info !=null && $user_info->images != null)
                                    <img src="{{ asset('storage/usersimages/'.$user_info['images']) }}" width="100" height="100">
                                    @else
                                    <img src="{{ asset('defalticon.png') }} " width="100" height="100">
                                    @endif
                                    <div class="input-form">
                                        <span class="btn btn-primary">
                                            <label for="images">アイコン画像</label>
                                            <input type="file" style="display:none" name="images" id="images" class="form-control">
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="input-form">
                                    <label for="name" class="text-dark">ユーザー名</label>
                                    <input name="name" class="form-control" id="name" placeholder="ユーザー名" value="{{ old('name', Auth::user()->name) }}" required>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="input-form">
                                    <label for="age" class="text-dark">年齢</label>
                                    <input name="age" id="age" class="form-control" placeholder="年齢" value="{{ old('age', $user_info ? $user_info['age'] : '') }}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="input-form">
                                    <label for="prefecture" class="text-dark">出身県</label>
                                    <input name="prefecture" id="prefecture" class="form-control" placeholder="出身県" value="{{ old('prefecture', $user_info ? $user_info['prefecture'] : '') }}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="sports" class="text-dark">スポーツ歴</label>
                                    <textarea name="sports" id="sports" class="form-control" placeholder="スポーツ">{{ old('sports', $user_info ? $user_info['sports'] : '') }}</textarea>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="comment" class="text-dark">自己紹介</label>
                                    <textarea name="comment" id="comment" class="form-control" placeholder="投稿内容">{{ old('comment', $user_info ? $user_info['comment']: '') }}</textarea>
                                </div>
                            </li>
                            <li class="list-group-item text-center">
                                <div class="input-form">
                                    <input type="submit" class="btn btn-primary mb-4" value=" 保存">
                                    <!-- <a href="/">ホームへ戻る</a> -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
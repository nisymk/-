@extends('layouts.layout')
@section('content')
<form action="{{ route('user_info.update', Auth::id()) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="create-items form-group">
        <div class="d-flex justify-content-around">
            <div class="card" style="width: 80rem; height: 60rem;">

                <div class="card-header text-dark text-center">
                    管理者アイコン編集画面
                </div>
                <ul class="list-group list-group-flush">
                    <div class="input-form">
                        @if(Auth::user()->userinfo != null && Auth::user()->userinfo->images != null)
                        <label for="images">画像</label>
                        <img src="{{ asset('storage/adminimages/'.$users->userinfo->images) }}" class="d-block mx-auto" width="400" height="400">
                        @else
                        <label for="images">画像</label>
                        <img src="{{ asset('defalticon.png') }}" class="d-block mx-auto" width="400" height="400">
                        @endif
                        <div class="input-form">
                            <span class="btn btn-primary d-block mx-auto">
                                <label for="images">画像を選択</label>
                                <input type="file" style="display:none" name="images" id="images" class="form-control">
                            </span>
                        </div>
                        <!-- <input type="file" name="images" id="images"> -->
                    </div>
                    <li class="list-group-item">
                        <div class="input-form text-center">
                            <label for="name" class="text-dark">管理者名</label>
                            <input name="name" value="{{ old('name', Auth::user()->name) }}" placeholder="AdminName" class="text-dark d-block mx-auto">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="input-form">
                            <input type="submit" class="btn btn-primary d-block mx-auto" value="アイコン画像編集">
                        </div>
                    </li>
                    <li class="list-group-item text-center">
                        <div>
                            <a href="/">ホーム画面へ戻る</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</form>
@endsection
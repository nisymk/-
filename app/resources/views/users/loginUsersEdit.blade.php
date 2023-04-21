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
                    <div class="card" style="width: 45rem; height: 40rem;">
                        <div class="card-header bg-primary">
                            つぶやき編集フォーム
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
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
                                    <label for="name">ユーザー名</label>
                                    <input name="name" class="form-control" id="name" placeholder="ユーザー名" value="{{ old('name', Auth::user()->name) }}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="input-form">
                                    <label for="prefecture">出身県</label>
                                    <input name="prefecture" id="prefecture" class="form-control" placeholder="出身県" value="{{ old('prefecture', $user_info ? $user_info['prefecture'] : '') }}">
                                </div>
                            </li>


                            <li class="list-group-item">
                                <div class="input-form">
                                    <label for="sports">スポーツ歴</label>
                                    <textarea name="sports">{{ old('sports', $user_info ? $user_info['sports'] : '') }}</textarea>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <!-- <div class="input-form">
                                    <label for="comment">自己紹介</label>
                                    <textarea name="comment">{{ old('comment', $user_info ? $user_info['comment']: '') }}</textarea>
                                </div> -->
                                <div class="form-group input-form">
                                    <label for="exampleFormControlTextarea1 comment">自己紹介</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment" id="comment">
                                    {{ old('comment', $user_info ? $user_info['comment']: '') }}
                                    </textarea>
                                </div>
                            </li>
                        </ul>
                        <div class="input-form">
                            <input type="submit" value="保存">
                            <!-- <a href="/">ホームへ戻る</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection



<!-- <div class="create-items form-group"> -->
<!-- <div class="d-flex justify-content-around"> -->
<!-- <div class="card" style="width: 45rem; height: 40rem;"> -->
<!-- <div class="card-header bg-primary">
    つぶやき編集フォーム
</div> -->
<!-- <ul class="list-group list-group-flush"> -->
<!-- <li class="list-group-item">
    <div class="input-form">
        <label for="title">タイトル</label>
        <input name="title" id="title" class="form-control" placeholder="タイトル" value="{{ old('title', $post['title']) }}">
    </div>
</li> -->
<!-- <li class="list-group-item">
    <div> -->
<!-- <img src="{{ asset('storage/usersimages/'.$post['images']) }} " width="100" height="100"> -->
<!-- @if($post != null && $post->images != null)
        <img src="{{ asset('storage/usersimages/'.$post['images']) }} " width="100" height="100">
        @else
        <img src="{{ asset('defobado.png') }} " width="100" height="100">
        @endif
    </div>
    <div class="input-form">
        <span class="btn btn-primary">
            <label for="images">画像を選択</label>
            <input type="file" style="display:none" name="images" id="images" class="form-control">
        </span>
    </div>
</li> -->
<li class="list-group-item">
    <div class=" form-group">
        <label for="comment"></label>
        <textarea name="comment" id="comment" class="form-control" placeholder="投稿内容">{{ old('comment', $post['comment']) }}</textarea>
    </div>
</li>
<li class="list-group-item">
    <div class="input-form">
        <input type="submit" class="btn btn-primary" value="編集してつぶやく">
    </div>
</li>
<!-- </ul> -->
<!-- </div>
</div>
</div> -->
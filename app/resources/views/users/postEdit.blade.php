@extends('layouts.layout')
@section('content')
<div class="create-items">
    <div class="form">
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
        <form action="{{ route('post.update', $post['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="create-items form-group">
                <div class="d-flex justify-content-around">
                    <div class="card" style="width: 45rem; height: 40rem;">
                        <div class="card-header bg-primary text-center">
                            つぶやき編集フォーム
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="input-form">
                                    <label for="title">つぶやきタイトル</label>
                                    <input name="title" id="title" class="form-control" placeholder="つぶやきタイトル" value="{{ old('title', $post['title']) }}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-block mx-auto">
                                    @if($post != null && $post->images != null)
                                    <img src="{{ asset('storage/usersimages/'.$post['images']) }}" class="d-block mx-auto" width="400" height="250">
                                    @else
                                    <img src="{{ asset('defobado.png') }} " width="100" height="100">
                                    @endif
                                </div>
                                <div class="input-form">
                                    <span class="btn btn-primary d-block mx-auto mt-2">
                                        <label for="images">画像を選択</label>
                                        <input type="file" style="display:none" name="images" id="images" class="form-control">
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="comment">つぶやき内容</label>
                                    <textarea name="comment" id="comment" class="form-control" placeholder="つぶやき内容">{{ old('comment', $post['comment']) }}</textarea>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="input-form">
                                    <input type="submit" class="btn btn-primary mx-auto d-block" value="編集してつぶやく">
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
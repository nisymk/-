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
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="create-items form-group">
                <div class="d-flex justify-content-around">
                    <div class="card" style="width: 45rem; height: 40rem;">
                        <div class="card-header bg-primary">
                            投稿フォーム
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="input-form">
                                    <label for="title"></label>
                                    <input name="title" id="title" class="form-control" placeholder="タイトル">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="input-form">
                                    <span class="btn btn-primary">
                                        <label for="images">画像を選択</label>
                                        <input type="file" style="display:none" name="images" id="images" class="form-control">
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class=" form-group">
                                    <label for="comment"></label>
                                    <textarea name="comment" id="comment" class="form-control" placeholder="投稿内容"></textarea>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="input-form">
                                    <input type="submit" class="btn btn-primary" value="つぶやく">
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
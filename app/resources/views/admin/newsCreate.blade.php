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
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="create-items form-group">
                <div class="d-flex justify-content-around">
                    <div class="card" style="width: 45rem; height: 40rem;">
                        <div class="card-header bg-primary text-center">
                            投稿フォーム
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="input-form">
                                    <label for="title"></label>
                                    <input name="title" id="title" class="form-control text-center" placeholder="タイトル" value="{{ old('title') }}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="input-form">
                                    <span class="btn btn-primary d-block mx-auto">
                                        <label for="images">画像を選択</label>
                                        <input type="file" style="display:none" name="images" id="images" class="form-control">
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class=" form-group">
                                    <label for="comment"></label>
                                    <textarea name="comment" id="comment" class="form-control text-center" placeholder="投稿内容">{{ old('comment') }}</textarea>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="input-form">
                                    <input type="submit" class="btn btn-primary mx-auto d-block" value="お知らせを作成">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endsection
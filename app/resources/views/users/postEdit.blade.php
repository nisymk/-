@extends('layouts.layout')
@section('content')
<div class="create-items">
    <div class="form">
        <form action="{{ route('post.update', $post['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-form">
                <label for="title">タイトル</label>
                <input name="title" value="{{ old('title', $post['title']) }}">
            </div>
            <div class="input-form">
                <label for="images">画像</label>
                <input type="file" name="images">
            </div>
            <div class=" input-form">
                <label for="comment">投稿内容</label>
                <textarea name="comment"></textarea>
            </div>
            <div class="input-form">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</div>
@endsection
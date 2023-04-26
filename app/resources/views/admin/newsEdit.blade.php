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

        <form action="{{ route('news.update', $news['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="create-items form-group">
                <div class="d-flex justify-content-around">
                    <div class="card" style="width: 45rem; height: 40rem;">
                        <div class="card-header bg-primary text-center">
                            お知らせ編集フォーム
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="input-form">
                                    <label for="title"><span class="badge bg-primary d-block">お知らせタイトル</span></label>
                                    <input name="title" id="title" class="form-control" placeholder="タイトル" value="{{ old('title', $news['title']) }}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <img src="{{ asset('storage/adminimages/'.$news['images']) }}" class="text-center d-block mx-auto" width="400" height="250">
                                </div>
                                <div class="input-form text-center mt-2">
                                    <span class="btn btn-primary d-block mx-auto">
                                        <label for="images">画像を選択</label>
                                        <input type="file" style="display:none" name="images" id="images" class="form-control">
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="comment"><span class="badge bg-primary">お知らせ内容</span></label>
                                    <textarea name="comment" id="comment" class="form-control" placeholder="投稿内容">{{ old('comment', $news['comment']) }}</textarea>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="input-form text-center">
                                    <input type="submit" class="btn btn-primary" value="お知らせを変更する">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
@endsection
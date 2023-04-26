@extends('layouts.layout')
@section('content')
@if (session('flash_message'))
<div class="flash_message bg-success text-center py-3 my-0">
    {{ session('flash_message') }}
</div>
@endif
<!-- 情報一覧 -->
<div class="container">
    <div class="post-list d-flex justify-content-center">
        <!-- <nav class="navbar navbar-expand-lg bg-info"> -->
        <div class="container justify-content-between">
            <div class="navbar-translate">
                <p class="list-title bg-primary h3 text-center">お知らせ 一覧</p>
                <div class="user-list">
                    <div class="box2">
                        <div class="text-center"><!-- 検索 -->
                            <div class="form">
                                <!-- <div>
                                    <button class="btn">検索</button>
                                </div> -->
                                <!-- 管理者お知らせ作成、編集 -->
                                <a href="{{ route('news.create') }}"><button class="btn btn-primary">お知らせ作成</button></a>
                                <a href="/" class="bg-primary h3">ホーム画面へ戻る</a>
                            </div>
                            <div class="post-list-column">
                                <div>
                                    @foreach($news as $new)
                                    <div class="card d-flex flex-row bd-highlight mt-3 mb-3 center-block" style="width: 70rem;">
                                        <div class="mr-5 mt-3">
                                            <img src="{{ asset('storage/adminimages/'.$new['images']) }} " width="100" height="100">
                                        </div>
                                        <div class="ml-5">
                                            <div class="text-dark mt-3" style="width: 40rem;">
                                                <p class="text-dark">お知らせタイトル：{{ $new['title'] }}</p>
                                            </div>
                                            <p class=" text-dark d-block text-truncate" style="max-width:420px;">お知らせ内容： {{ $new['comment'] }}</p>
                                            </div>
                                            <div class="container">
                                                <div class="mt-3">
                                                    <div class="col-2">
                                                        <a href="{{ route('news.edit', $new['id']) }}">
                                                            <button type="" class="btn btn-primary">編集</button>
                                                        </a>
                                                    </div>
                                                    <div class="col-2 mt-3">
                                                        <form action="{{ route('news.destroy', $new['id']) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">削除</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </body>
        @endsection

        </html>
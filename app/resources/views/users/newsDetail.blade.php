@extends('layouts.layout')
@section('content')

<div class="create-items">
    <div class="d-flex justify-content-around">
        <div>
            <ul class="list-group">
                <div class="card" style="width: 45rem; height: 40rem;">
                    <div class="card-header bg-primary">
                        イベント参加申請フォーム
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-dark">お知らせタイトル　{{ $news['title'] }}</li>
                        <li class="list-group-item text-dark">お知らせ画像　
                            <img src="{{ asset('storage/adminimages/'.$news['images']) }} " style="width: 25rem; height: 20rem;">　
                        </li>
                        <li class="list-group-item text-dark">お知らせ詳細内容　{{ $news['comment'] }}</li>
                        <li class="list-group-item text-dark">
                            <a href="/">ホームへ戻る</a></li>
                    </ul>
        </div>
        @if($like_model->like_exist(Auth::user()->id, $news['id']))
        <p class="">
            <button class="js-event-toggle event" href="" data-eventid="{{ $news['id'] }}"><i class="fas">参加やめる</i></button>
        </p>
        @else
        <p class="">
            <button class="js-event-toggle" href="" data-eventid="{{ $news['id'] }}"><i class="fas">参加をする</i></button>
        </p>
        @endif
        </ul>
    </div>
</div>
</div>
<style>
    .event i {
        color: red !important;
    }
</style>

@endsection
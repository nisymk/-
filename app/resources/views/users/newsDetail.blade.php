@extends('layouts.layout')
@section('content')

<div class="create-items">
    <div class="d-flex justify-content-around">
        <div>
            <ul class="list-group">
                <div class="card" style="width: 55rem; height: 55rem;">
                    <div class="card-header bg-primary">
                        お知らせイベント参加申請フォーム
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-dark">お知らせタイトル：　{{ $news['title'] }}</li>
                        <li class="list-group-item text-dark">お知らせ画像：
                            <img src="{{ asset('storage/adminimages/'.$news['images']) }} " style="width: 25rem; height: 20rem;">　
                        </li>
                        <li class="list-group-item text-dark">{{ $news['comment'] }}</li>
                    </ul>
                </div>
                <div class="bg-primary text-center d-flex justify-content-around">
                    <div class="col-3">
                        <a href="/" class="text-white">ホームへ戻る</a>
                    </div>
                    <div class="col-3">
                        @if($like_model->like_exist(Auth::user()->id, $news['id']))
                        <p class="">
                            <button class="js-event-toggle event btn open" href="" data-eventid="{{ $news['id'] }}"><i class="fas"></i></button>
                        </p>
                        @else
                        <p class="">
                            <button class="js-event-toggle btn" href="" data-eventid="{{ $news['id'] }}"><i class="fas"></i></button>
                        </p>
                        @endif
                    </div>

                </div>
            </ul>
        </div>
    </div>
</div>
<style>
    .btn::before {
        content: "参加する";
    }

    .btn.open::before {
        content: "参加をやめる";
    }
</style>

@endsection
@extends('layouts.layout')

@section('content')
<!-- 検索 -->
<div class="form">
    <!-- <div>
            <button class="btn">検索</button>
        </div> -->
    <!-- ユーザー投稿作成、編集 -->
    <div class="my-3">
        <div class="text-right">
            <button type="button" class="btn btn-primary">
                <a href="{{ route('post.create') }}" class="text-white">
                    つぶやき作成
                </a>
            </button>
            <button type="button" class="btn btn-primary">
                <a href="{{ route('post.index') }}" class="text-white">
                    つぶやき一覧画面へ
                </a>
            </button>
        </div>
    </div>
</div>

<!-- 情報一覧 -->
<div class="text-center">
    <figure class="figure">
        <img src="{{ asset('storage/adminimages/5183ef65b82a66cf573f324e59cf028b.jpeg') }}" class="figure-img img-fluid rounded" alt="..." width="700" height="200">
    </figure>
</div>
<div class="info-list text-center">
    <div class="list text-center">
        <div class=""><!-- 投稿記事一覧 -->
            <div class="">
                <p class="bg-info">お知らせ一覧</p>
            </div>
            <div>
                @foreach($news as $new)
                <div class="card mt-3">
                    <div class="row no-gutters">
                        <div class="col-md-4 mt-5">
                            <img src="{{ asset('storage/adminimages/'.$new['images']) }}" class="card-img-top" alt="..." style="width: 300px;">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="card-title w-50 m-2 bg-primary">
                                    <a href="{{ route('news.show', $new['id']) }}" class="text-white">{{ $new['title'] }}</a>
                                </div>
                                <div class="text-left text-overflow-lines" style="height: 150px;">
                                    <span class="card-text text-dark" style="width: 300px;">{{ $new['comment'] }}</span>
                                </div>
                                @if($like_model->like_exist(Auth::user()->id,$new->id))
                                <p class="favorite-marke" style="padding: 30px;">
                                    <button class="js-like-toggle loved btn-lg" href="" data-newsid="{{ $new->id }}"><i class="fas fa-heart"></i></button>
                                </p>
                                @else
                                <p class="favorite-marke" style="padding: 30px;">
                                    <button class="js-like-toggle btn-lg" href="" data-newsid="{{ $new->id }}"><i class="fas fa-heart"></i></button>
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<style>
    .loved i {
        color: red !important;
    }
</style>
</body>
@endsection

</html>
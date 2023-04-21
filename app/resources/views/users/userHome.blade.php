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
                    投稿作成
                </a>
            </button>
            <button type="button" class="btn btn-primary">
                <a href="{{ route('post.index') }}" class="text-white">
                    投稿一覧画面へ
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
                                <div class="text-left" style="height: 150px;">
                                    <span class="card-text" style="width: 300px;">{{ $new['comment'] }}</span>
                                </div> @if($like_model->like_exist(Auth::user()->id,$new->id))
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

<!--  carousel  -->
<!-- <div class="section" id="carousel">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mr-auto ml-auto"> -->
<!-- Carousel Card -->
<!-- <div class="card card-raised card-carousel">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="./assets/img/bg2.jpg" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4>
                                        <i class="material-icons">location_on</i> Yellowstone National Park, United States
                                    </h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="./assets/img/bg3.jpg" alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4>
                                        <i class="material-icons">location_on</i> Somewhere Beyond, United States
                                    </h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="./assets/img/bg.jpg" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4>
                                        <i class="material-icons">location_on</i> Yellowstone National Park, United States
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <i class="material-icons">keyboard_arrow_left</i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <i class="material-icons">keyboard_arrow_right</i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div> -->
<!-- End Carousel Card -->
<!-- </div>
        </div>
    </div>
</div> -->
<!--         end carousel -->
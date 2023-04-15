@extends('layouts.layout')
@section('content')
@if (session('flash_message'))
<div class="flash_message bg-success text-center py-3 my-0">
    {{ session('flash_message') }}
</div>
@endif
<!-- 検索 -->
<div class="form">
    <div>
        <button class="btn">検索</button>
    </div>
    <!-- 管理者お知らせ作成、編集 -->
    <div>
        <div>
            <a href="{{ route('news.create') }}"><button class="btn">お知らせ作成</button></a>
        </div>
    </div>
</div>
<!-- 情報一覧 -->
<div class="info-list">
    <div class="list col-md-5"><!-- ユーザー一覧 -->
        <p class="list-title">お知らせ 一覧</p>
        <div class="user-list">
            <div class="box2"></div>
            <div>
                @foreach($news as $new)
                <tr>
                    <th scope="col">
                        <a href="">{{ $new['title'] }}</a>
                    </th>
                    <th scope='col'>{{ $new['comment'] }}</th>
                    <th scope="col">
                        <a href="{{ route('news.edit', $new['id']) }}">
                            編集
                        </a>
                    </th>
                    <th scope="col">
                        <form action="{{ route('news.destroy', $new['id']) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">削除</button>
                        </form>
                    </th>
                </tr>
                @endforeach
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
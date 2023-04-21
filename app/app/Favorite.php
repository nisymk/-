<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorite';
    public function like()
    {
        return $this->belongsTo('App\user', 'user_id', 'id'); //多対1の関係:userが多でlikeが1
        // ※ 1つの投稿にいいね機能をつけるのは1つだが、他の投稿に同じユーザーがいいねするので多対1になる
    }
    public function news()
    {
        return $this->belongsTo('App\News', 'news_id', 'id'); //多対1の関係:userが多でlikeが1
        // ※ 1つの投稿にいいね機能をつけるのは1つだが、他の投稿に同じユーザーがいいねするので多対1になる
    }
    public function like_exist($user_id, $news_id)
    {
        return Favorite::where('user_id', $user_id)->where('news_id', $news_id)->exists();
        // ※exists()はlikeテーブル内にuser_idのカラムと$user_idのカラムで一致してるものがないか、
        //   stock_idのカラムと$stock_idのカラムで一致してるものがないかをチェックしてくれるもの
    }
}

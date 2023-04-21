<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post'; 
    protected $guarded = ['id'];
    protected $fillable = ['title', 'images', 'comment'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $guarded = ['id'];
    protected $table = 'user_info'; 

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }
    public function post()
    {
        return $this->hasMany('App\Post', 'id', 'user_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    protected $table = 'user_info'; 
    protected $guarded = ['id'];
}

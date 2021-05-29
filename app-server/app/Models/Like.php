<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    protected $fillable = [
        'post_id',
        'user_id',
    ];

    public function user(){
        return $this->hasMany(User::class,'post_id', 'id');
    }

    public function post(){
        return $this->belongsToMany(Post::class,'user_id', 'id');
    }
}

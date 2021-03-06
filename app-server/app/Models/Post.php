<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'user_id', 
        'city_id',
        'category_id',
        'status_id',
        'title',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function postImage(){
        return $this->hasOne(Post_image::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function like(){
        return $this->hasMany(Like::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }

    //サークルCIテスト記述
    //記事をいいねしたユーザーの中に、引数として渡された$userがいるかどうか
    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->likes->where('id', $user->id)->count()
            : false;
    }

}
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
        'titile',
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

    public function user(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

}
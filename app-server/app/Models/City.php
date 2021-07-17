<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'post_id',
        'name',
        'area',
        'file_path',
    ];

    public function post(){
        return $this->hasMany(Post::class);
    }

}



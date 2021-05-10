<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post_image extends Model
{
    protected $table = 'post_images';

    protected $fillable = [
        'post_id',
        'file_name',
        'file_path',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}

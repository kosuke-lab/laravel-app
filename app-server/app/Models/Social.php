<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Social extends Model
{

    protected $fillable =[
        'user_id',
        'social_name',
        'social_password',
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = []; //when post model was loaded this means no security

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
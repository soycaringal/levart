<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name',
        'guide',
        'content',
        'budget',
        'distance',
        'eta',
        'rank',
        'likes',
        'views',
    ];

    public function files() {
        return $this->hasMany('App\File');
    }
}

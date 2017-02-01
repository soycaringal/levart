<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name'
    ];

    public function destination()
    {
        return $this->hasOne('App\Destination');
    }
}

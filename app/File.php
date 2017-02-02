<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'filename'
    ];
    public function destination() {
        return $this->belongsTo('App\Destination');
    }
}

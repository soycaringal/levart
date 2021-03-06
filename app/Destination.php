<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
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

    public function address() {
        return $this->belongsTo('App\Address');
    }

    public function files() {
        return $this->hasMany('App\File');
    }

    // this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($destination) { // before delete() method call this
            $destination->address()->delete();
            // do the rest of the cleanup...
        });
    }

}

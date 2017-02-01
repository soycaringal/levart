<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotspot extends Model
{
    protected $fillable = [
        'name',
        'rank',
    ];


    public function address() {
        return $this->belongsTo('App\Address');
    }

    // this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($hotspot) { // before delete() method call this
            $hotspot->address()->delete();
            // do the rest of the cleanup...
        });
    }


}

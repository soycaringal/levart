<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street',
        'brgy',
        'city',
        'province',
        'region',
    ];

    public function hotspot()
    {
        return $this->hasOne('App\Hotspot');
    }

    public function destination()
    {
        return $this->hasOne('App\Destination');
    }
}

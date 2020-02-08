<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['addressesble_id', 'addressesble_type', 'address', 'complement', 'city_id', 'country_id',
        'latitude', 'longitude'];
}

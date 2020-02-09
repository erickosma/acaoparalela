<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = ['addressesble_id', 'addressesble_type', 'address', 'complement', 'city_id', 'country_id',
        'latitude', 'longitude'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ong extends Model
{
    protected $fillable = ['user_id', 'addresses_id', 'fantasy_name', 'company_name',
        'description', 'site'];
}

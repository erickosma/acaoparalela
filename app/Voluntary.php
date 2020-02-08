<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voluntary extends Model
{
    protected $fillable = ['user_id', 'objective', 'description'];
}

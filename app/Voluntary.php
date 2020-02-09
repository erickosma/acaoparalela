<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voluntary extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'objective', 'description'];
}

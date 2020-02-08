<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    protected $fillable = ['user_id', 'phone', 'email', 'type'];

}

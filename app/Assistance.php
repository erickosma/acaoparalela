<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'sys_occupation_areas_id', 'type', 'manual'];
}

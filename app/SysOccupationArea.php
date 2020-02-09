<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SysOccupationArea extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];
}

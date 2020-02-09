<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserConfig extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'confidential_address', 'confidential_email', 'confidential_phone',
        'confidential_notification'];


}

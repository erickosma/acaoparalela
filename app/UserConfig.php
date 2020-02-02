<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserConfig extends Model
{
    protected $fillable = ['user_id', 'confidential_address', 'confidential_email', 'confidential_phone',
        'confidential_notification'];


}

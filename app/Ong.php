<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ong extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'addresses_id', 'fantasy_name', 'company_name',
        'description', 'site'];

    /**
     * Get the user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

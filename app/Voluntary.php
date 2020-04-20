<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voluntary extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'objective', 'description'];

    /**
     * Get the user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the post's image.
     */
    public function slug()
    {
        return $this->morphOne(Slug::class, 'mySlug');
    }
}

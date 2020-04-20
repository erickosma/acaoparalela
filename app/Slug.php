<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use  \Illuminate\Database\Eloquent\Builder;

class Slug extends Model
{
    use Sluggable;

    protected $fillable = ['slugable_id', 'slugable_type', 'title', 'title_slug'];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'title_slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the owning imageable model.
     */
    public function mySlug()
    {
        return $this->morphTo();
    }
}

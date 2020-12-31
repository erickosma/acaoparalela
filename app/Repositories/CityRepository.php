<?php


namespace App\Repositories;

use App\City;
use App\Repositories\Contracts\CityRepositoryInterface;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    protected $model = City::class;

    public function findBySlug($slug)
    {
        return $this->model->where('slug', 'like', '%' . $slug . '%')
            ->get()
            ->first();
    }
}

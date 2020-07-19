<?php


namespace App\Repositories;

use App\Repositories\Contracts\VoluntaryRepositoryInterface;
use App\Voluntary;

class VoluntaryRepository extends BaseRepository implements VoluntaryRepositoryInterface
{
    protected $model = Voluntary::class;
}

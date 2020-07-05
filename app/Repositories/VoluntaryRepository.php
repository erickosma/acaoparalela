<?php


namespace App\Repositories;


use App\Enums\UserType;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\VoluntaryRepositoryInterface;
use App\User;
use App\Voluntary;

class VoluntaryRepository extends BaseRepository implements VoluntaryRepositoryInterface
{
    protected $model = Voluntary::class;
}

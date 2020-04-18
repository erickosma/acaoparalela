<?php


namespace App\Repositories;


use App\Enums\UserType;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\VoluntaryRepositoryInterface;
use App\User;
use App\Voluntary;

class VoluntaryRepository extends BaseRepository implements VoluntaryRepositoryInterface
{
    /**
     * BaseRepository constructor.
     *
     * @param Voluntary $voluntary
     */
    public function __construct(Voluntary $voluntary)
    {
        parent::__construct($voluntary);
    }
}

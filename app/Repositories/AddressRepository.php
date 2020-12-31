<?php


namespace App\Repositories;


use App\Address;
use App\Repositories\Contracts\AddressRepositoryInterface;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{
    protected $model = Address::class;

}

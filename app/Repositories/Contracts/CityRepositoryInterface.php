<?php


namespace App\Repositories\Contracts;


interface CityRepositoryInterface extends RepositoryInterface
{

    public function findBySlug($slug);
}

<?php


namespace App\Repositories\Contracts;


interface UserRepositoryInterface extends RepositoryInterface
{

    public function userType($id);
}

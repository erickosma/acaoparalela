<?php


namespace App\Repositories\Contracts;


interface RepositoryInterface
{
    public function findAll();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id);


}

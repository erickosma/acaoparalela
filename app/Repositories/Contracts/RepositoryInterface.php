<?php


namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function findAll();

    public function findAllOrderBy($name, $order=null);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id);

    public function findBy(array $criteria, array $orderBy = null, $limit = null);

    public function findOneBy(array $criteria);

    public function findOrCreate(array $attributes, array $values = []);

    public function updateOrCreate(array $attributes, array $values = []);

    public function paginate();

    public function getModel();
}

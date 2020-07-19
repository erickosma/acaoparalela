<?php


namespace App\Repositories;


use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     */
    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    protected function resolveModel(){
        return app($this->model);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|Model[]
     */
    public function findAll()
    {
        return $this->model->all();
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function update(array $data, $id)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    /**
     * @param array $attributes
     *
     * @param array $values
     * @return Model
     */
    public function findOrCreate(array $attributes, array $values = []): Model
    {
        return $this->model->firstOrCreate($attributes, $values);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        /** @var  $localModel  Model */
        $localModel = $this->model;

        if (count($criteria) == 1) {
            foreach ($criteria as $c) {
                $localModel = $localModel->where($c[0], $c[1], $c[2]);
            }
        } elseif (count($criteria > 1)) {
            $localModel = $localModel->where($criteria[0], $criteria[1], $criteria[2]);
        }

        if (count($orderBy) == 1) {
            foreach ($orderBy as $order) {
                $localModel = $localModel->orderBy($order[0], $order[1]);
            }
        } elseif (count($orderBy > 1)) {
            $localModel = $localModel->orderBy($orderBy[0], $orderBy[1]);
        }

        if (count($limit)) {
            $localModel = $localModel->take((int)$limit);
        }

        if (count($offset)) {
            $localModel = $localModel->skip((int)$offset);
        }

        return $localModel->get();
    }

    public function findOneBy(array $criteria)
    {
        return $this->findBy($criteria)->first();
    }

    public function paginate()
    {
        return $this->model->cursorPaginate(2);
    }

    public function getModel()
    {
        return $this->model;
    }

}

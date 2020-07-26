<?php


namespace App\Repositories;


use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
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
     * @return Collection|Model[]
     */
    public function findAll()
    {
        return $this->model->all();
    }

    /**
     * @param string $name
     * @param string $order
     * @return Collection|Model[]
     */
    public function findAllOrderBy($name, $order = null)
    {
        if(empty($order)){
            return $this->model->orderBy($name);
        }

        return $this->model->orderBy($name, $order);
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

    public function updateOrCreate(array $attributes, array $values = []){
        return $this->model->updateOrCreate($attributes, $values);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @param array $criteria
     * @param array|null $orderBy
     * @param null $limit
     * @return Model
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null)
    {
        /** @var  $localModel  Model */
        $localModel = $this->model;

        if (!empty($criteria) && count($criteria) > 1) {
            foreach ($criteria as $key=>$c) {
                if(is_array($c)){
                    $localModel = $localModel->where(array_key_first($c), array_shift($c));
                }
                else{
                    $localModel = $localModel->where($key, $c);
                }
            }
        } elseif (!empty($criteria) && count($criteria) == 1) {
            $localModel = $localModel->where(array_key_first($criteria),  array_shift($criteria));
        }

        if (!empty($orderBy) && count($orderBy) == 1) {
            foreach ($orderBy as $order) {
                $localModel = $localModel->orderBy(array_key_first($order), array_shift($order));
            }
        } elseif (!empty($orderBy) && count($orderBy) > 1) {
            $localModel = $localModel->orderBy(array_key_first($orderBy), array_shift($orderBy));
        }

        if ( !empty($limit) && count($limit)) {
            $localModel = $localModel->cursorPaginate(((int)$limit));
        }

        return $localModel;
    }

    /**
     * @param array $criteria
     * @return mixed
     */
    public function findOneBy(array $criteria)
    {
        return $this->findBy($criteria)->get()
            ->first();
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

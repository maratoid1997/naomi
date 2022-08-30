<?php


namespace App\Repositories;


use App\Repositories\Contractors\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->create($attributes);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @return Collection
     */
    public function all(){
        return $this->model->all();
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function save($id, $data)
    {
        $this->model->unsetEventDispatcher();
        return $this->model->updateOrCreate(['id' => $id], $data);
    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function delete($id): bool{
        return $this->find($id)->delete();
    }
}

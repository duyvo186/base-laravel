<?php

namespace App\Http\Respositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function paginate($itemOnPage)
    {
        return $this->model->paginate($itemOnPage);
        // TODO: Implement paginate() method.
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getAll()
    {
        return $this->model->newModelQuery()->get();
    }

    public function getByConditions(array $array)
    {
        return $this->model->newModelQuery()->where($array)->get();
    }

    public function find($id)
    {
        return $this->getModel()::find($id);
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    public function insert(array $data)
    {
        return $this->model->newModelQuery()->create($data);
    }

    public function updateMass(array $data, array $conditions)
    {
        $result = $this->getModel()::where($conditions)->first();
        if ($result) {
            $result->update($data);
            return true;
        }
        return false;
    }

    public function update(array $data, $id)
    {
        $result = $this->getModel()::find($id);
        if ($result) {
            $result->update($data);

            return true;
        }
        return false;
    }
}

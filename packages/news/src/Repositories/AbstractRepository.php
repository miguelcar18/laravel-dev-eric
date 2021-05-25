<?php

namespace Packages\News\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AbstractRepository
{
    /**
     * @var Model $model
     */
    protected $model;
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->model->get();
    }

    public function get()
    {
        return $this->model->get();
    }

    public function count()
    {
        return $this->model->count();
    }

    /**
     * @return static
     */
    public function newInstance()
    {
        return $this->model->newInstance();
    }

    /**
     * @param $id
     *
     * @return Model
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    public function first()
    {
        return $this->model->oldest()->first();
    }

    public function last()
    {
        return $this->model->latest()->first();
    }
    /**
     * @param array $attributes
     *
     * @return static
     */
    public function firstOrCreate(array $attributes = [], array $values = [])
    {
        return $this->model->firstOrCreate($attributes, $values);
    }

    /**
     * @param array $input
     *
     * @return Model
     */
    public function create(array $input)
    {
        return $this->model->create($input);
    }

    /**
     * @param array $input
     *
     * @return static
     */
    public function forceCreate(array $input)
    {
        $this->model->unguard();
        $instance = $this->model->create($input);
        $this->model->reguard();
        return $instance;
    }
    /**
     * @throws \Exception
     */
    public function deleteAll()
    {
        $this->model->delete();
    }
    /**
     * @param Eloquent $model
     *
     * @return mixed
     */
    public function save(Model $model)
    {
        return $model->save();
    }

    public function update(Model $model, array $attributes)
    {
        return $model->update($attributes);
    }
    /**
     * Delete an Eloquent Model from database
     *
     * @param Model $model
     *
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Model $model)
    {
        return $model->delete();
    }
    /**
     * Force a hard delete on a soft deleted model.
     *
     * This method protects developers from running forceDelete when trait is missing.
     *
     * @return bool|null
     */
    public function forceDelete(Model $model)
    {
        return $model->forceDelete();
    }

    public function truncate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->model->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1 ;');
    }
}

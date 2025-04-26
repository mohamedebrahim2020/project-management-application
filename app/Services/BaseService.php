<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseService
{
    protected BaseRepository $repository;

	/**
	 * @param BaseRepository $repository
	 */
	public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

	/**
	 * @return Collection
	 */
	public function index()
    {
        return $this->repository->all();
    }

	/**
	 * @param $id
	 * @return Model|null
	 */
	public function show($id) : ?Model
    {
        return $this->repository->find($id);
    }

	/**
	 * @param $data
	 * @return Model
	 */
	public function store($data) : Model
    {
        return $this->repository->store($data, false);
    }

	/**
	 * @param array $data
	 * @param $id
	 * @return bool
	 */
	public function update(array $data, $id) : bool
    {
        return $this->repository->update($data, $id);
    }

	/**
	 * @param $model
	 * @return void
	 */
	public function delete($model) : void
    {
        $this->repository->delete($model);
    }
}

<?php

	namespace App\Repositories;

	use App\Filters\TaskFilter;
	use App\Models\Task;
	use Illuminate\Database\Eloquent\Collection;

	class TaskRepository extends BaseRepository
	{
		/**
		 * UserRepository constructor.
		 *
		 * @param Task $model
		 */
		public function __construct(Task $model)
		{
			parent::__construct($model);
		}

		/**
		 * @return Collection
		 */
		public function all() : Collection
		{
			return Task::filter(app(TaskFilter::class))->get();
		}
	}
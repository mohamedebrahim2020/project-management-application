<?php

	namespace App\Services;

	use App\Http\Resources\TaskResource;
	use App\Repositories\TaskRepository;
	use Illuminate\Database\Eloquent\Collection;
	use Illuminate\Support\Facades\Cache;
	use Illuminate\Support\Facades\Log;

	class TaskService extends BaseService
	{
		/**
		 * @param TaskRepository $repository
		 */
		public function __construct(TaskRepository $repository)
		{
			$this->repository = $repository;
		}

		/**
		 * @return Collection|mixed|void
		 */
		public function index() : mixed
		{
			if (request()->hasAny(['status', 'priority']) || ! Cache::has('tasks')) {
				return parent::index();
			}
			if (Cache::has('tasks')) {
				Log::alert('yes');
				return Cache::get('tasks');
			}
		}
	}
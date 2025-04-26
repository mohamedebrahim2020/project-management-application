<?php

	namespace Tests\Feature;

	use App\Models\Task;
	use Illuminate\Foundation\Testing\RefreshDatabase;
	use Illuminate\Foundation\Testing\WithFaker;
	use Illuminate\Support\Facades\Schema;

	class IndexTaskTest extends BaseTestCase
	{
		use RefreshDatabase, WithFaker;

		const INDEX_TASK_ROUTE = 'tasks.index';

		/**
		 * A basic test example.
		 */
		public function test_index_task_successfully(): void
		{
			Task::factory()->count(5)->create();

			$response = $this->getJson(route(self::INDEX_TASK_ROUTE));
			$response->assertOk();
			$response->assertJsonStructure([
				'data' => [
					'*' => [
						'id',
						'title',
						'description',
						'status',
						'status_label',
						'priority',
						'priority_label',
						'created_at',
						'updated_at',
					]
				],
			]);
			$this->assertDatabaseCount('tasks', 5);
		}

		/**
		 * A basic test example.
		 */
		public function test_index_task_database_status_indexing_performance(): void
		{
			ini_set('memory_limit', '512M');

			// Seed 3000git  tasks with random status
			Task::factory()->count(3000)->create();

			$start = microtime(true);
			$this->getJson(route(self::INDEX_TASK_ROUTE, ['status' => 1]));
			$durationWithIndex = microtime(true) - $start;

			// Remove index if it exists
			Schema::table('tasks', function ($table) {
				$table->dropIndex(['status']);
			});
			$start = microtime(true);
			$this->getJson(route(self::INDEX_TASK_ROUTE, ['status' => 1]));
			$durationWithoutIndex = microtime(true) - $start;
			$this->assertGreaterThan($durationWithoutIndex, $durationWithIndex);
		}

		/**
		 * A basic test example.
		 */
		public function test_index_task_database_priority_indexing_performance(): void
		{
			// Seed 3000 tasks with random status
			Task::factory()->count(3000)->create();

			$start = microtime(true);
			$this->getJson(route(self::INDEX_TASK_ROUTE, ['priority' => 1]));
			$durationWithIndex = microtime(true) - $start;

			// Remove index if it exists
			Schema::table('tasks', function ($table) {
				$table->dropIndex(['priority']);
			});
			$start = microtime(true);
			$this->getJson(route(self::INDEX_TASK_ROUTE, ['priority' => 1]));
			$durationWithoutIndex = microtime(true) - $start;
			$this->assertGreaterThan($durationWithoutIndex, $durationWithIndex);
		}
	}

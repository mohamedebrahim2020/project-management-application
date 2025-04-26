<?php

	namespace Tests\Feature;

	use App\Models\Task;
	use Illuminate\Foundation\Testing\RefreshDatabase;
	use Illuminate\Foundation\Testing\WithFaker;

	class StoreTaskTest extends BaseTestCase
	{
		use RefreshDatabase, WithFaker;

		const STORE_TASK_ROUTE = 'tasks.store';

		/**
		 * A basic test example.
		 */
		public function test_store_task_successfully(): void
		{
			$data = Task::factory()->make()->toArray();

			$response = $this->postJson(route(self::STORE_TASK_ROUTE), $data);

			$response->assertCreated();
			$response->assertJsonStructure([
				'data' => [
					'id', 'title', 'description', 'status', 'status_label',
					'priority', 'priority_label', 'created_at', 'updated_at'
				]
			]);
			$this->assertDatabaseHas('tasks', $data);

		}

		/**
		 * A basic test example.
		 */
		public function test_store_task_failed_as_invalid_input(): void
		{
			$data = Task::factory()->make()->toArray();
			unset($data['description']);

			// assert that any required input will give invalid error
			$this->checkRequiredInputs($data, self::STORE_TASK_ROUTE);

			// assert that title max chars is 100
			$data = Task::factory()->make()->toArray();
			$data['title'] = $this->faker()->realTextBetween(101, 150);
			$response = $this->postJson(route(self::STORE_TASK_ROUTE), $data);
			$response->assertUnprocessable();
			$response->assertJsonValidationErrors('title');

			// assert that both status and priority must be on of (0, 1, 2)
			$data = Task::factory()->make()->toArray();
			$data['status'] = $data['priority'] = 3;
			$response = $this->postJson(route(self::STORE_TASK_ROUTE), $data);
			$response->assertUnprocessable();
			$response->assertJsonValidationErrors(['status', 'priority']);
		}
	}

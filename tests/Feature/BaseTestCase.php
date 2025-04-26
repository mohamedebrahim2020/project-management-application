<?php

	namespace Tests\Feature;

	use Tests\TestCase;

	class BaseTestCase extends TestCase
	{
		/**
		 * @param array $data
		 * @param string $routeName
		 * @return void
		 */
		protected function checkRequiredInputs(array $data , string $routeName): void
		{
			foreach ($data as $key => $value) {
				unset($data[$key]);
				$response = $this->postJson(route($routeName), $data);
				$response->assertUnprocessable();
				$response->assertJsonValidationErrors([$key]);
			}
		}
	}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(100),
			'description' => $this->faker->text(200),
			'status' => $this->faker->randomElement([0, 1, 2]),
			'priority' => $this->faker->randomElement([0, 1, 2]),
        ];
    }
}

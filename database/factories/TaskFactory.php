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
        $statuses = ['New', 'In progress', 'Complete', 'Remove'];

        return [
            'title' => $this->faker->unique()->sentence(),
            'description' => $this->faker->text(),
            'status' => $this->faker->randomElement($statuses)
        ];
    }
}

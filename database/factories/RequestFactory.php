<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 3),
            'board_id' => $this->faker->numberBetween(1, 3),
            'konten' => $this->faker->sentence(mt_rand(3, 6)),
            'detail' => $this->faker->paragraph(mt_rand(3, 6)),
            'status' => $this->faker->randomElement(['pending', 'on progress', 'done', 'rejected', 'revised']),
            'deadline' => $this->faker->dateTimeBetween('now', '+1 years'),
        ];
    }
}

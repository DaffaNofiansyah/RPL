<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PIC>
 */
class PICFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'req_id' => $this->faker->numberBetween(1, 10),
            'admin_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}

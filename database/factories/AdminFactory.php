<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $domain = 'gmail.com';
        return [
            'name' => fake()->name(),
            'divisi_id' => 1,       
            'username' => fake()->unique()->userName(),
            'phone' => fake()->unique()->phoneNumber(),
            'photo' => "uploads/temp.png",
            'email' => fake()->unique()->userName() . '@' . $domain,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }
}

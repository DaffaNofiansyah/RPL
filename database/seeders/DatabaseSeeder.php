<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Admin::factory(10)->create();
        \App\Models\Req::factory(10)->create();
        \App\Models\User::factory()->count(10)->create();
        \App\Models\Divisi::factory(3)->create();
        \App\Models\Board::factory(3)->create();
        \App\Models\PIC::factory(10)->create();
    }
}

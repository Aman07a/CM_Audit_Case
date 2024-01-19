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
        // Seed 5 customers, each with an audit, 50 questions, and 50 answers
        \App\Models\Customer::factory(5)
            ->has(
                \App\Models\Audit::factory()
                    ->has(\App\Models\Answer::factory(50), 'answers')
                    ->count(1)
            )
            ->create();
    }
}

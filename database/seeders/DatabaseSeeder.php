<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

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

        // Update progress percentage for each customer
        \App\Models\Customer::all()->each(function ($customer) {
            try {
                $customer->updateProgressPercentage();
            } catch (\Exception $e) {
                // Log the error using the logger helper function
                Log::error('Exception caught: ' . $e->getMessage());
            }
        });

        // // Seed a new customer with an audit, 50 questions, and 50 answers
        // $newCustomer = \App\Models\Customer::factory()
        //     ->has(
        //         \App\Models\Audit::factory()
        //             ->has(\App\Models\Answer::factory(50), 'answers')
        //             ->count(1)
        //     )
        //     ->create();

        // try {
        //     // Update progress percentage for the new customer
        //     $newCustomer->updateProgressPercentage();
        // } catch (\Exception $e) {
        //     // Log the error using the logger helper function
        //     Log::error('Exception caught: ' . $e->getMessage());
        // }
    }
}

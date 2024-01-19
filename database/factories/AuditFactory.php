<?php

namespace Database\Factories;

use App\Models\Audit;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuditFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Audit::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'customer_id' => \App\Models\Customer::factory(),
            'name' => $this->faker->word,
            'question_progress_percentage' => $this->faker->numberBetween(0, 100),
        ];
    }
}

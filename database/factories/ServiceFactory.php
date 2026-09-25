<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\ServiceType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'service_type_id' => ServiceType::factory(),
            'name' => fake()->sentence(3),
            'price' => fake()->randomFloat(2, 1, 500),
            'description' => fake()->optional()->sentence(),
            'status' => true,
        ];
    }
}

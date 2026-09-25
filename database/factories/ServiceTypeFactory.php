<?php

namespace Database\Factories;

use App\Models\ServiceType;
use App\Models\ServiceTypeCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ServiceType>
 */
class ServiceTypeFactory extends Factory
{
    protected $model = ServiceType::class;

    public function definition(): array
    {
        return [
            'service_type_category_id' => ServiceTypeCategory::factory(),
            'name' => fake()->words(2, true),
            'description' => fake()->optional()->sentence(),
            'price' => fake()->randomFloat(2, 1, 500),
            'status' => true,
        ];
    }
}
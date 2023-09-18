<?php

namespace Database\Factories\Customer;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'subtitle' => $this->faker->title,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'created_by' => User::factory()->create()->id,
            'expire_date' => now()->addMonth()->format('Y-m-d')
        ];
    }
}

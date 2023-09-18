<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'username' => $this->faker->unique()->userName,
            'password' => bcrypt('123123'),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->email,
        ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 5; $i++)
        {
            $firstName = $faker->firstName();
            $lastName = $faker->lastName();
            $fulName = $firstName.' '.$lastName;
            $gender = array('male', 'female');

            User::create([
                'name' => $fulName,
                'email' => $faker->email(),
                'password' => bcrypt('Deneme.123456'),
                'gender' => $gender[rand(0, 1)],
                'slug' => Str::slug($fulName, '-'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

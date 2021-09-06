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
        $genderArray= array('male', 'female');

        for($i = 0; $i < 5; $i++)
        {
            $firstName = $faker->firstName();
            $lastName = $faker->lastName();
            $fulName = $firstName.' '.$lastName;

            $gender = $genderArray[rand(0, 1)];

            User::create([
                'name' => $fulName,
                'email' => $faker->email(),
                'password' => bcrypt('Deneme.123456'),
                'gender' => $gender,
                'slug' => Str::slug($fulName, '-'),
                'images' => ($gender == 'male') ? 'male_user_image.png' : 'female_user_image.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

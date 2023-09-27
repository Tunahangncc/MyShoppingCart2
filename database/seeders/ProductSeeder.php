<?php

namespace Database\Seeders;

use App\Models\Customer\Product;
use Illuminate\Database\Seeder;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::factory()->count(10)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ColorSeeder::class);
        $this->call(ProductSeeder::class);
    }
}

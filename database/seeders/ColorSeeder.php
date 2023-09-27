<?php

namespace Database\Seeders;

use App\Models\Customer\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    public function run()
    {
        Color::factory()->count(10)->create();
    }
}

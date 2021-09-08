<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class ColorSeeder extends Seeder
{
    use WithFaker;

    public function __construct()
    {
        $this->setUpFaker();
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            'GRAY' => '#6B7280',
            'RED' => '#DC2626',
            'BLUE' => '#2563EB',
            'GREEN' => '#059669',
        ];

        //Insert color
        foreach ($colors as $colorKey => $color)
        {
            if (!Color::query()->where('hex_code', $colorKey)->first())
            {
                Color::create([
                    'name' => $color,
                    'hex_code' => $colorKey
                ]);
            }
        }
    }
}

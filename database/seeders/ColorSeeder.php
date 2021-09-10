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
            '#6B7280' => 'GRAY',
            '#DC2626' => 'RED',
            '#2563EB' => 'BLUE',
            '#059669' => 'GREEN',
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

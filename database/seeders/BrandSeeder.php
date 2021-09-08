<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            '1' =>[
                'ACER', 'APPLE', 'ASUS', 'AMAZON', 'BLACKBERRY', 'BOSCH', 'CASIO', 'GIGABYTE',
                'GOOGLE', 'HONOR', 'HP', 'HTC', 'HUAWEI', 'LENOVO', 'LG', 'MICROSOFT', 'MITSUBISHI',
                'MOTOROLA', 'NOKIA', 'NVIDIA', 'OPPO', 'PANASONIC', 'PHILIPS', 'SAMSUNG', 'SIEMENS',
                'SONY', 'TCL', 'TOSHIBA', 'XIAOMI'
            ],

            '2' =>[
                "L'OREAL", 'GILETTE', 'NIVEA', 'ESTEE LAUDER', 'CLINIQUE', 'GUERLAIN', 'SHISEIDO', 'GARNIER',
                'PANTENE', 'DOVE'
            ],

            '3' =>[
                'HORROR', 'DRAMA', 'FUNNY', 'FABL', 'STORY', 'HISTORY', 'NOVEL'
            ]
        ];

        //Insert brands
        foreach ($brands as $brandKey => $brand)
        {
            foreach ($brand as $brandItem)
            {
                Brand::create([
                    'name' => $brandItem,
                    'slug' => Str::slug($brandItem, '-'),
                    'category_id' => $brandKey
                ]);
            }
        }
    }
}

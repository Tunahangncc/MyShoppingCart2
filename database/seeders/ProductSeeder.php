<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Product::factory()->count(50)->create();

        /*$this->setUpFaker();
        $images = [
            'phone.png', 'computer.png', 'mouse.png', 'headphone.png', 'keyboard.png'
        ];
        $uniqCode = 0;

        for ($i=0; $i<50; $i++)
        {
            $name = $this->faker->firstName();
            $brand = Brand::query()->inRandomOrder()->first();
            $color = Color::query()->inRandomOrder()->first();
            $user = User::query()->inRandomOrder()->first();
            $category = Category::query()->inRandomOrder()->first();

            Product::create([
                'name' => $name,
                'brand_id' => $brand->id,
                'price' => rand(1000, 3000),
                'amount' => rand(1, 5),
                'owner_id' => $user->id,
                'color_id' => $color->id,
                'category_id' => $category->id,
                'slug' => Str::slug($name, '-'),
                'image' => $images[rand(0, count($images) - 1)],
                'uniq_code' => $uniqCode,
                'description' => 'Empty'
            ]);

            $uniqCode++;
        }*/
    }
}

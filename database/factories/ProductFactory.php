<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    use WithFaker;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->setUpFaker();
        $images = [
            'phone.png', 'computer.png', 'mouse.png', 'headphone.png', 'keyboard.png'
        ];
        $uniqCode = $this->faker->unique()->randomNumber(8);
        $name = $this->faker->firstName();

        $brand = Brand::query()->inRandomOrder()->first();
        $color = Color::query()->inRandomOrder()->first();
        $user = User::query()->inRandomOrder()->first();
        $category = Category::query()->inRandomOrder()->first();

        return [
            'name' => $name,
            'brand_id' => $brand->id,
            'price' => rand(1000, 3000),
            'amount' => rand(1, 5),
            'user_id' => $user->id,
            'color_id' => $color->id,
            'category_id' => $category->id,
            'slug' => Str::slug($name, '-'),
            'image' => $images[rand(0, count($images) - 1)],
            'uniq_code' => $uniqCode,
            'description' => 'Empty',
        ];

    }
}

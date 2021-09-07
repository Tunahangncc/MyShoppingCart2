<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\RelatedCategory;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $mainCategories = ['Electronic', 'Cosmetic', 'Book'];
        $subCategories = [
            '1'=>['4'=>'Computer', '5'=>'Camera', '6'=>'Phone'],
            '2'=>['7'=>'Make-Up', '8'=>'Skin Care', '9'=>'Perfume'],
            '3'=>['10'=>'Drama', '11'=>'Horror', '12'=>'Adventure']
        ];
        $grandCategories = [
            '4'=>['13'=>'Desktop', '14'=>'Laptop'],
            '5'=>['15'=>'Picture', '16'=>'Video'],
            '6'=>['17'=>'Key Phone', '18'=>'Smart Phone']
        ];

        //Insert Main Category
        for ($i=0; $i<count($mainCategories); $i++)
        {
            $category = new Category;
            $category->name = $mainCategories[$i];
            $category->slug = Str::slug($mainCategories[$i], '-');
            $category->created_at = now();
            $category->updated_at = now();
            $category->save();

            RelatedCategory::create([
                'category_id' => $category->id,
                'top_categories' => '0',
            ]);
        }

        //Insert Sub Category
        foreach ($subCategories as $topCategory => $subCategory)
        {
            foreach ($subCategory as $itemKey => $item)
            {
                $category = new Category;
                $category->name = $item;
                $category->slug = Str::slug($item, '-');
                $category->created_at = now();
                $category->updated_at = now();
                $category->save();

                RelatedCategory::create([
                    'category_id' => $itemKey,
                    'top_categories' => $topCategory,
                ]);
            }
        }

        //Insert Grand Category
        foreach ($grandCategories as $topCategory => $grandCategory)
        {
            foreach ($grandCategory as $itemKey => $item)
            {
                $category = new Category;
                $category->name = $item;
                $category->slug = Str::slug($item, '-');
                $category->created_at = now();
                $category->updated_at = now();
                $category->save();

                RelatedCategory::create([
                    'category_id' => $itemKey,
                    'top_categories' => '1,'.$topCategory,
                ]);
            }
        }
    }
}

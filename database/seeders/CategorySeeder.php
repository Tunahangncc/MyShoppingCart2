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
        /*
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
                $category->parent_id = $topCategory;
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
                $category->parent_id = $topCategory;
                $category->created_at = now();
                $category->updated_at = now();
                $category->save();

                RelatedCategory::create([
                    'category_id' => $itemKey,
                    'top_categories' => '1,'.$topCategory,
                ]);
            }
        }
        */

        $mainCategories = ['1'=>'Electronic', '2'=>'Cosmetic', '3'=>'Book'];

        $subCategories = [
            '1' => ['4' => 'Computer', '5' => 'Phone', '6' => 'Camera'],
            '2' => ['7' => 'Make-Up', '8' => 'Skin-Care', '9' => 'Perfume'],
            '3' => ['10' => 'Drama', '11' => 'Adventure', '12' => 'Horror']
        ];

        $grandCategories = [
            '4' => ['13' => 'Desktop', '14' => 'Laptop'],
            '5' => ['15' => 'Key Phone', '16' => 'Smart Phone'],
            '6' => ['17' => 'Video', '18' => 'Picture']
        ];

        $topCategories = '';

        //insert Main Category
        foreach ($mainCategories as $mainKey => $mainCategory)
        {
            Category::create([
                'name' => $mainCategory,
                'slug' => Str::slug($mainCategory, '-'),
            ]);

            if($mainKey == '1'){ $topCategories = '1,4,5,6,13,14,15,16,17,18'; }
            else if($mainKey == '2'){ $topCategories = '2,7,8,9'; }
            else if($mainKey == '3'){ $topCategories = '3,10,11,12'; }

            RelatedCategory::create([
                'category_id' => $mainKey,
                'top_categories' => $topCategories,
            ]);
        }

        //Insert Sub Category
        foreach ($subCategories as $subKey => $subCategory)
        {
            foreach ($subCategory as $itemKey => $item)
            {
                Category::create([
                    'name' => $item,
                    'slug' => Str::slug($item, '-'),
                    'parent_id' => $subKey
                ]);

                if($subKey == '1')
                {
                    if($itemKey == '4') { $topCategories = '4,13,14'; }
                    else if($itemKey == '5') { $topCategories = '5,15,16'; }
                    else if($itemKey == '6') { $topCategories = '6,17,18'; }
                }
                else if($subKey == '2')
                {
                    if($itemKey == '7') { $topCategories = '7'; }
                    else if($itemKey == '8') { $topCategories = '8'; }
                    else if($itemKey == '9') { $topCategories = '9'; }
                }
                else if($subKey == '3')
                {
                    if($itemKey == '10') { $topCategories = '10'; }
                    else if($itemKey == '11') { $topCategories = '11'; }
                    else if($itemKey == '12') { $topCategories = '12'; }
                }

                RelatedCategory::create([
                    'category_id' => $itemKey,
                    'top_categories' => $topCategories
                ]);
            }
        }

        //Insert Grand Category
        foreach ($grandCategories as $grandKey => $grandCategory) {
            foreach ($grandCategory as $itemKey => $item)
            {
                Category::create([
                    'name' => $item,
                    'slug' => Str::slug($item, '-'),
                    'parent_id' => $grandKey
                ]);

                if($grandKey == '4')
                {
                    if($itemKey == '13') { $topCategories = '13'; }
                    else if($itemKey == '14') { $topCategories = '14'; }
                }
                else if($grandKey == '5')
                {
                    if($itemKey == '15') { $topCategories = '15'; }
                    else if($itemKey == '16') { $topCategories = '16'; }
                }
                else if($grandKey == '6')
                {
                    if($itemKey == '17') { $topCategories = '17'; }
                    else if($itemKey == '18') { $topCategories = '18'; }
                }

                RelatedCategory::create([
                    'category_id' => $itemKey,
                    'top_categories' => $topCategories,
                ]);
            }
        }
    }
}

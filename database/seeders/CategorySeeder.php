<?php

namespace Database\Seeders;

use App\Models\CategoriesPivot;
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

        /*
        $mainCategories = [1 => 'electronic', 2 => 'cosmetic', 3 => 'book'];
        $subCategories = [
            1 => [4 => 'computer', 5 => 'phone', 6 => 'camera'],
            2 => [7 => 'skin-care', 8 => 'make-up', 9 => 'perfume'],
            3 => [10 => 'drama', 11 => 'horror', 12 => 'action']
        ];
        $grandCategories = [
            4 => [13 => 'laptop', 14 => 'desktop'],
            5 => [15 => 'key phone', 16 => 'smart phone']
        ];

        //insert main category
        foreach ($mainCategories as $key => $mainCategory)
        {
            Category::create([
                'name' => Str::upper($mainCategory),
                'slug' => Str::slug($mainCategory, '-'),
                'parent_id' => null
            ]);
        }

        //insert sub category
        foreach ($subCategories as $key => $subCategory)
        {
            foreach ($subCategory as $itemKey => $item)
            {
                Category::create([
                    'name' => Str::upper($item),
                    'slug' => Str::slug($item, '-'),
                    'parent_id' => $key,
                ]);
            }
        }

        //insert grand category
        foreach ($grandCategories as $key => $grandCategory)
        {
            foreach ($grandCategory as $itemKey => $item)
            {
                Category::create([
                    'name' => Str::upper($item),
                    'slug' => Str::slug($item, '-'),
                    'parent_id' => $key,
                ]);
            }
        }

        //Create Pivot

        //Main Pivot
        foreach ($mainCategories as $mainKey => $mainCategory)
        {
            //Firstly Subcategory
            foreach ($subCategories as $subKey => $subCategory)
            {
                if($subKey == $mainKey)
                {
                    foreach ($subCategory as $subItemKey => $subItem)
                    {
                        CategoriesPivot::create([
                            'category_id' => $mainKey,
                            'sub_id' => $subItemKey,
                        ]);
                    }
                }
            }

            //Secondly Grand Category
            foreach ($grandCategories as $grandKey => $grandCategory)
            {
                foreach ($grandCategory as $grandItemKey => $grandItem)
                {
                    CategoriesPivot::create([
                        'category_id' => $mainKey,
                        'sub_id' => $grandItemKey,
                    ]);
                }
            }
        }

        //Second Pivot
        foreach ($subCategories as $subKey => $subCategory)
        {
            foreach ($subCategory as $subItemKey => $subItem)
            {
                foreach ($grandCategories as $grandKey => $grandCategory)
                {
                    if($subItemKey == $grandKey)
                    {
                        foreach ($grandCategory as $grandItemKey => $grandItem)
                        {
                            CategoriesPivot::create([
                                'category_id' => $subItemKey,
                                'sub_id' => $grandItemKey,
                            ]);
                        }
                    }
                }
            }
        }
        */
    }
}

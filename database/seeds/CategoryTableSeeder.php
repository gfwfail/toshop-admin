<?php

use Illuminate\Database\Seeder;


class CategoryTableSeeder extends Seeder
{
    public function run()
    {

        DB::table('categories')->delete();

        $categories = ['Women\'s Clothing',
            'Men\'s Clothing',
            'Travel & Vacations',
            'Health & Beauty',
            'Shoes & Handbags',
            'Electronics & Computers',
            'Home, Garden & Tools',
            'Baby, Kids & Toys',
            'Sports & Outdoors',
            'Food & Restaurants',
            'Books & Digital Media',
            'Flowers & Gifts',
            'Office Supplies'];

        foreach($categories as $category){
            DB::table('categories')->insert(
                [
                    'name'=>$category,
                    'slug'=>str_slug($category)
                ]
            );
        }

    }
}

<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {

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

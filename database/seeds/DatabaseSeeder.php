<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'smblog@gmail.com',
            'password' => bcrypt('yejiaan'),
        ]);


        DB::table('users')->insert([
            'name' => 'admin2',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        $categories = ['Clothing, Shoes & Jewelry',
            'Health & Beauty',
            'Toys, Kids & Baby',
            'Electronics',
            'Computer & Office',
            'Travel & Auto',
            'Sports & Outdoors',
            'Books & Magazines',
            'Video Games',
            'Movies & Music',
            'Home & Garden',
            'Flowers, Gifts & Gourmet'];

        foreach($categories as $category){
            DB::table('categories')->insert(
                [
                    'name'=>$category,
                    'slug'=>str_slug($category)
                ]
            );
        }

        Model::reguard();
    }
}

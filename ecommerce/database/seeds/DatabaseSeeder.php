<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Category::class,11)->create();
        // $this->call(UserSeeder::class);
//        $this->call(CategorySeeder::class);
        foreach (\App\Category::all() as $category){
            $category->subcategories()->saveMany(factory(\App\Subcategory::class,rand(0,15))->make());

        }
        factory(\App\Product::class,rand(30,50))->create();
    }
}

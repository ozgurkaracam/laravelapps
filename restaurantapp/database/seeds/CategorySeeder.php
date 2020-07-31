<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Category::class,10)->create()->each(function($category){
            $category->foods()->saveMany(factory(\App\Food::class,rand(1,5))->make());
        });
    }
}

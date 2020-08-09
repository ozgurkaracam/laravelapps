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
        \App\User::create([
            'name'=>'Ozgur',
            'email'=>'test@test.com',
            'password'=>\Illuminate\Support\Facades\Hash::make('password')
        ]);
        factory(\App\Category::class,5)->create();
        foreach (\App\Category::all() as $category){
            $category->subcategories()->saveMany(factory(\App\Subcategory::class,3)->make());

        }
        factory(\App\Product::class,rand(30,50))->create();
    }
}

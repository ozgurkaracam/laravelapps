<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $category=\App\Category::all()->random();
    return [
        'name'=>$faker->words(rand(1,4),true),
        'image'=>$faker->image('public/images',400,300,null,false),
        'description'=>$faker->text,
        'in_additional'=>$faker->text,
        'price'=>$faker->numberBetween(5,1200),
        'category_id'=> $category->id,
        'subcategory_id'=>$category->subcategories->random()->id
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $name=$faker->words(rand(1,3),true);
    return [
        'name'=>$name,
        'image'=>$faker->image('public/images',400,300,null,false),
        'description'=>$faker->text,
        'slug'=>\Illuminate\Support\Str::slug($name)
    ];
});

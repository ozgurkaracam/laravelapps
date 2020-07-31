<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Food::class, function (Faker $faker) {
    return [
            'name'=>$faker->foodName(),
            'description'=>$faker->text,
        'price'=>$faker->numberBetween(5,100),
        'image'=>$faker->image('public/images',400,300, null, false)

    ];
});

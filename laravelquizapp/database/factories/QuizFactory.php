<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Quiz;
use Faker\Generator as Faker;

$factory->define(Quiz::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'description'=>$faker->sentence,
        'duration'=>$faker->numberBetween(2,15)
    ];
});

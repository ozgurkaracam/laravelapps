<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $quizzes=factory(\App\Quiz::class,rand(5,10))->create();




    }
}

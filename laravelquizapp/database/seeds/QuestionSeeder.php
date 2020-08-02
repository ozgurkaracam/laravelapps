<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Quiz::all() as $quiz){
            $quiz->questions()->saveMany(factory(\App\Question::class,rand(3,8))->make());
        }

    }
}

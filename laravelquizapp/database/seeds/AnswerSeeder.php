<?php

use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Question::all() as $question){
            $question->answers()->saveMany(factory(\App\Answer::class,4)->make());
            $best_answer= $question->answers->random();
            $best_answer->is_correct=1;
            $best_answer->save();
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Result;
use App\Quiz;


class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        foreach (User::all() as $user){
//            $quizzes=Quiz::all();
//
//            for($i=0;$i++;$i<$quizzes->count()){
//                    foreach($quizzes[$i]->questions as $question) {
//                        $r=new Result();
//                        $r->user_id=$user->id;
//                        $r->quiz_id=$quizzes[$i]->id;
//                        $r->question_id=$question->id;
//                        $r->answer_id=$question->answers[rand(0,3)]->id;
//                        $r->save();
//                     }
//                     }
//            }
        foreach(User::all() as $user){
            foreach($user->quizzes as $quiz){
                foreach ($quiz->questions as $question){
                            if($quiz->id%2==1){
                                Result::create([
                                    'user_id'=>$user->id,
                                    'question_id'=>$question->id,
                                    'quiz_id'=>$quiz->id,
                                    'answer_id'=>$question->answers[rand(0,3)]->id
                                ]);
                            }
                    }

            }
        }

        }

}

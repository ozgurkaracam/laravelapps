<?php

use Illuminate\Database\Seeder;

class UserQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=\App\User::all();
        foreach ($users as $user){
            $user->quizzes()->attach(\App\Quiz::all()->random(rand(0,5)));
        }
    }
}

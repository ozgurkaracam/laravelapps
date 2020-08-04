<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return view('welcome');
});

Route::get('/quiz/{id}/start','HomeController@startQuiz')->name('start.quiz');
Route::post('/quiz/{id}/start','QuestionController@storeresult')->name('start.quiz');
Route::get('/quiz/{quizid}/results/{userid}','QuizController@results')->name('quiz.results');

Route::group(['prefix'=>'admin','middleware'=>'CheckAdmin'],function(){
    Route::get('/',function (){
        return view('admin.index');
    })->name('admin.index');
    Route::resource('quizzes','QuizController');

    Route::resource('questions','QuestionController');
    Route::resource('users','UserController');
    Route::get('/questions/create/{quiz?}','QuestionController@create')->name('questions.create.quiz');

    Route::get('/user/quizzes','UserController@UsersQuizzes')->name('users.quizzes');
    Route::get('/user/{id}/quizzes','UserController@UserQuizzes')->name('user.quizzes');
    Route::put('/user/{id}/quizzes','UserController@updateQuizzes')->name('user.update.quizzes');

    Route::get('/quiz/users','QuizController@QuizzesUsers')->name('quizzes.users');
    Route::get('/quiz/{id}/users','QuizController@QuizUsers')->name('quiz.users');
    Route::put('/quiz/{id}/users','QuizController@updateUsers')->name('quiz.update.users');
    Route::get('/quizzes/questions/{id?}','QuestionController@quizQuestion')->name('quizzes.questions');
});


Auth::routes([
    'register'=>false,
    'verify'=>false,
    'reset'=>false
]);

Route::get('/home', 'HomeController@index')->name('home');


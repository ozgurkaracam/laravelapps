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

Route::get('/',function (){
    return view('admin.index');
});

Route::resource('quizzes','QuizController');

Route::resource('questions','QuestionController');
Route::resource('users','UserController');
Route::get('/questions/create/{quiz?}','QuestionController@create')->name('questions.create.quiz');

Route::get('/quizzes/questions/{id?}','QuestionController@quizQuestion')->name('quizzes.questions');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

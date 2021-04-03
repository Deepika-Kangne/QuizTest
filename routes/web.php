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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', ['as' => 'login', 'uses' => 'Login\LoginController@showLoginForm']);
Route::post('login', 'Login\LoginController@authenticate');
Route::get('logout', 'Login\LoginController@destroy');


Route::group(['middleware' => ['auth']], function () {

    Route::get('dashboard', 'Quiz\QuizController@indexScore');
    Route::post('dashboard', 'Quiz\QuizController@postScore');

    //Route::resource('user','UserController');

    Route::get('users', 'User\UserController@getUsers');
    Route::get('user/add', 'User\UserController@addUser');
    Route::post('user/add', 'User\UserController@postaddUser');
    Route::get('user/edit/{userid}', 'User\UserController@editUser');
    Route::post('user/edit/{userid}', 'User\UserController@posteditUser');
    Route::any('user/delete/{userid}', 'User\UserController@destroy');

    ////////////////////////////////////////////MCQ  TAB //////////////////////////////////
    Route::get('startMCQ', 'Quiz\QuizController@getQuiz');

    ////////////////////////////////////////////ORDERS////////////////////////////////////////////
    Route::get('scoreboard', 'Quiz\QuizController@getScoreBoard');

    ////////////////////////////////////////////PRODUCT////////////////////////////////////////////
    Route::match(['get', 'post'], 'productlist', 'ProductController@getProductList');
});


<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/welcome/{welcome}', 'VoteController@pollvote');


//poll
// Route::resource('/poll', 'pollController');

Route::resource('/vote', 'voteController');
Route::get('/poll', 'PollController@index');

Route::group(['middleware' => ['web','auth']],function(){
    

Route::get('/poll/create', 'PollController@create');
Route::post('/poll', 'PollController@store');


});

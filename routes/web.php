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

//Route::get('/', 'ListController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/got', [
    'middleware' => ['auth'],
    'uses' => function () {
        echo "You are allowed to view this page!";
    }]);

Route::get('/transactions', 'TransactionController@searchTransactions');
Route::post('/transactions', 'TransactionController@getTransactions');
Auth::routes();
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/user', 'UserProfileController@putUpdateUser');
Auth::routes();
Route::get('/', 'UserProfileController@getUserProfile')->middleware('auth');
Auth::routes();
Route::post('/user', 'UserProfileController@putUpdateUser')->name('update');


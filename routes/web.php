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

Route::get('/', 'ListController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/got', [
    'middleware' => ['auth'],
    'uses' => function () {
        echo "You are allowed to view this page!";
    }]);
Auth::routes();
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('/home', 'HomeController@index')->name('home');
/*
|-------------------------------------------------------------------------------
| Updates a User's Profile
|-------------------------------------------------------------------------------
| URL:            /user
| Controller:     API\UsersController@putUpdateUser
| Method:         PUT
| Description:    Updates the authenticated user's profile
*/
Route::get('/user', 'UserProfileController@putUpdateUser');
/*
|-------------------------------------------------------------------------------
| Updates a User's Profile
|-------------------------------------------------------------------------------
| URL:            /user
| Controller:     API\UsersController@putUpdateUser
| Method:         GET
| Description:    Get's the authenticated user's profile
*/
Route::get('/user', 'UserProfileController@getUserProfile');
Route::put('/user', 'UserProfileController@updateUserProfile');

<?php



Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');;

Auth::routes();
Route::get('/got', [
    'middleware' => ['auth'],
    'uses' => function () {
        echo "You are allowed to view this page!";
    }]);

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');


Route::get('/transactions', 'TransactionController@searchTransactions')->middleware('auth');
Route::post('/transactions', 'TransactionController@getTransactions');
Route::post('/transactionsDelete', 'TransactionController@deleteTransaction');
Route::post('/transactionAdd', 'TransactionController@putTransaction')->middleware('auth');
Route::get('/transactionAdd', 'TransactionController@addTransaction')->middleware('auth');

Route::get('/customers', 'TransactionController@searchTransactions')->middleware('auth');
Route::post('/customers', 'TransactionController@getTransactions');
Route::post('/customerDelete', 'TransactionController@deleteTransaction');
Route::post('/customerAdd', 'TransactionController@putTransaction')->middleware('auth');
Route::get('/customerAdd', 'TransactionController@addTransaction')->middleware('auth');


Route::get('/', 'UserProfileController@getUserProfile')->middleware('auth');
Route::post('/user', 'UserProfileController@putUpdateUser')->name('update');




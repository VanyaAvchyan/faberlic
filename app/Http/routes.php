<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('lang/{lang?}', function($locale='am'){
    $locale = func_get_arg(0);
    return redirect($locale);
});

Route::controller('user', '\App\Http\Controllers\User\UserController');
Route::controller('training', '\App\Http\Controllers\User\TrainingController');

Route::get('/account/{code?}/{lang?}', '\App\Http\Controllers\SiteController@getSiteByCode');
Route::get('/{lang?}', '\App\Http\Controllers\SiteController@getIndex');
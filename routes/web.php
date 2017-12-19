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
    return redirect('home');
});
Route::get('login','Backend\LoginController@getLogin');
Route::post('login','Backend\LoginController@postLogin');
Route::get('logout','Backend\LoginController@getLogout');


Route::group(['middleware'=>'admin','prefix'=>'/'],function (){
    Route::get('profile','Backend\LoginController@getProfile');
    Route::get('home','Backend\LoginController@getHome');
    Route::resource('category','Backend\CategoryController');
    Route::get('delete-category/{id}','Backend\CategoryController@getDelete');

});


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

Route::any('/addemployee', 'ATGController@index');
Route::post('/registeruser', 'ATGController@store');
Route::post('/login', 'ATGController@login');
Route::get('/', 'ATGController@viewstudent');
Route::get('/editstudent', 'ATGController@editstudent');
Route::any('/deleteuser', 'ATGController@destroy');
Route::any('/update', 'ATGController@update');
Route::any('/piechart', 'ATGController@piechart');
Route::any('/sendmail', 'EventController@sendmail');
Route::any('/event', 'EventController@index');
Route::any('/addevent', 'EventController@store');

Route::get('/home', function()
{
    return View::make('home');
});

<?php



Route::get('/', function () {
    return view('welcome');
});

Route::get('/meals','MealsController@index');





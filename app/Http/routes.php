<?php

Route::get('/', 'BlogController@getIndex');

Route::get('/signup', 'BlogController@getSignup');
Route::post('/signup', 'BlogController@postSignup');

Route::get('/newpost', 'BlogController@getNewpost');
Route::post('/newpost', 'BlogController@postNewpost');

Route::get('/login', 'BlogController@getLogin');
Route::post('/login', 'BlogController@postLogin');

Route::get('/logout', 'BlogController@getLogout');
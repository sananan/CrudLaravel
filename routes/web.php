<?php

Route::get('/', 'libroControlador@index');

Route::resource('libro', 'libroControlador');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

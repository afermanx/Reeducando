<?php

use Illuminate\Support\Facades\Route;

/*
 * Rotas Site
 * */
Route::namespace('Auth')->group(function () {
    Route::get('/', 'UsersLoginController@loginForm')->name('Auth.loginForm');

    Route::post('/login', 'UsersLoginController@login')->name('Auth.login');


});

Route::namespace('Admin')->group(function () {
    Route::get('/dashboard', 'DashController@index')->name('Admin.dash');




});

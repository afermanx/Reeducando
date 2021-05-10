<?php

use Illuminate\Support\Facades\Route;

/*
 * Rotas Site
 * */
Route::namespace('Auth')->group(function () {
    Route::get('/', 'UsersLoginController@loginForm')->name('Auth.loginForm');
    Route::get('/register', 'UsersLoginController@registerForm')->name('Auth.registerForm');
    Route::get('/logout', 'LoginController@logout')->name('Auth.logout');

    Route::post('/login', 'UsersLoginController@login')->name('Auth.login');




});

Route::namespace('Admin')->group(function () {
    Route::get('/dashboard', 'DashController@index')->name('Admin.dash');


  //start router Users

    Route::get('/cadastro/usuarios', 'UsersController@index')->name('Admin.users');

    Route::post('/usuario/salvar', 'UsersController@store')->name('Admin.users.save');
    Route::post('/usuario/excluir', 'UsersController@destroy')->name('Admin.users.delete');
    Route::post('/usuario/mostrar', 'UsersController@show')->name('Admin.users.show');
    Route::post('/usuario/editar', 'UsersController@edit')->name('Admin.users.edit');
  //end Routes Users

    //start router Services

    Route::get('/cadastro/serviços', 'ServicesController@index')->name('Admin.services');

    //end Routes Services



});

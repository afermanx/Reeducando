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



//     Start routes users
        Route::get('/cadastro/usuarios', 'UsersController@index')->name('Admin.users');
        Route::get('/usuario/perfil', 'UsersController@perfil')->name('Admin.perfil');

        Route::post('/usuario/salvar', 'UsersController@store')->name('Admin.users.save');
        Route::post('/usuario/mostrar', 'UsersController@show')->name('Admin.users.show');
        Route::post('/usuario/editar', 'UsersController@edit')->name('Admin.users.edit');
        Route::post('/usuario/excluir', 'UsersController@destroy')->name('Admin.users.delete');
//     End routes users



//     Start routes services
        Route::get('/cadastro/servicos', 'ServicesController@index')->name('Admin.services');
        Route::post('/servicos/salvar', 'ServicesController@store')->name('Admin.services.save');
        Route::post('/servicos/excluir', 'ServicesController@destroy')->name('Admin.services.delete');
//     End routes services

});

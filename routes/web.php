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
        Route::get('/cadastro/detentos', 'UsersController@detentos')->name('Admin.detentos');
        Route::get('/usuario/perfil', 'UsersController@perfil')->name('Admin.perfil');

        Route::post('/usuario/salvar', 'UsersController@store')->name('Admin.users.save');
        Route::post('/usuario/mostrar', 'UsersController@show')->name('Admin.users.show');
        Route::post('/usuario/editar', 'UsersController@edit')->name('Admin.users.edit');
        Route::post('/usuario/excluir', 'UsersController@destroy')->name('Admin.users.delete');
//     End routes users



//     Start routes services
        Route::get('/cadastro/servicos', 'ServicesController@index')->name('Admin.services');
        Route::post('/servicos/salvar', 'ServicesController@store')->name('Admin.services.save');
        Route::post('/servicos/mostrar', 'ServicesController@show')->name('Admin.services.show');
        Route::post('/servicos/editar', 'ServicesController@edit')->name('Admin.services.edit');
        Route::post('/servicos/excluir', 'ServicesController@destroy')->name('Admin.services.delete');
//     End routes services

//     Start routes ordens services
        Route::get('/os', 'OrderServiceController@index')->name('Admin.os');
        Route::get('/os/cadastro', 'OrderServiceController@os')->name('Admin.os.register');
        Route::post('/os/salvar', 'OrderServiceController@salvar')->name('Admin.os.save');
        Route::get('/os/mostrar/{id}', 'OrderServiceController@show')->name('Admin.os.show');
        Route::post('/os/editar', 'OrderServiceController@edit')->name('Admin.os.edit');
        Route::post('/os/finalizar', 'OrderServiceController@finalizar')->name('Admin.os.finalizar');
        Route::get('/os/finalizar/recibo/{data}', 'OrderServiceController@gerarRecibo')->name('Admin.os.recibo');

        Route::post('/os/excluir', 'OrderServiceController@destroy')->name('Admin.os.delete');
//     End routes ordens services

     // start rotas financeiro
    Route::get('/financeiro/caixa', 'CaixaController@index')->name('Admin.caixa');

    //caixa detento
    Route::get('/financeiro/caixa/detento', 'CaixaDetentoController@index')->name('Admin.caixa.detento');
    Route::get('/caixa/detento/retirada/{id}', 'CaixaDetentoController@retirada')->name('Admin.caixa.detento.retirada');
    Route::post('/caixa/detento/retirada/', 'CaixaDetentoController@retirar')->name('Admin.caixa.detento.retirar');
    Route::get('/caixa/detento/recibo/', 'CaixaDetentoController@recibo')->name('Admin.caixa.detento.recibo');

    //caixa Oficina

    Route::get('/caixa/oficina/retirada/{id}', 'CaixaOficinaController@index')->name('Admin.caixa.oficina');
    Route::post('/caixa/oficina/retirada/', 'CaixaOficinaController@retirar')->name('Admin.caixa.oficina.retirar');
//    Route::get('/caixa/detento/recibo/', 'CaixaDetentoController@recibo')->name('Admin.caixa.detento.recibo');

    //end rotas financeiro

    //start rotas relatorios services
    Route::get('/relatorio/servico','reports\ReportSevicesController@index')->name('Admin.report.service');



    //end rotas relatorios services



});


Route::fallback(function (){
    return redirect()->route('Admin.dash');
});

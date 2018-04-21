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
    return view('welcome');
});

Route::prefix('login')->as('login.')->group(function(){
	Route::get('', 'LoginController@Index')->name('login');    
	Route::post('entrar', 'LoginController@Entrar')->name('entrar');
	Route::post('esqueci-minha-senha', 'LoginController@EsqueciSenha')->name('esqueciminhasenha');
});

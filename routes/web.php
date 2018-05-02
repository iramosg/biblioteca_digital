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
	
	Route::get('facebook', 'LoginController@redirectToProvider');
	Route::get('facebook/callback', 'LoginController@handleProviderCallback');
});



Route::prefix('admin')->as('admin.')->group(function(){
	Route::get('', 'Admin\HomeController@index')->name('index');  

	Route::prefix('login')->as('login.')->group(function(){
		Route::get('', 'Admin\LoginController@index')->name('index');       
		Route::get('logout', 'Admin\LoginController@logout')->name('logout');       
		Route::post('auth', 'Admin\LoginController@auth')->name('auth');       
	});
	
	Route::prefix('livros')->as('livros.')->group(function(){
		Route::get('', 'Admin\LivrosController@index')->name('index');    
		Route::get('editar/{id}', 'Admin\LivrosController@editar')->name('editar');    
		Route::get('cadastrar', 'Admin\LivrosController@cadastrar')->name('cadastrar');    
	});
	
	Route::prefix('categorias')->as('categorias.')->group(function(){
		Route::get('', 'Admin\CategoriasController@index')->name('index');    
		Route::get('editar/{id}', 'Admin\CategoriasController@editar')->name('editar');    
		Route::get('cadastrar', 'Admin\CategoriasController@editar')->name('cadastrar');    
	});
	
	Route::prefix('usuarios')->as('usuarios.')->group(function(){
		Route::get('admin', 'Admin\UsuariosController@admin')->name('admin');    
		Route::get('usuarios', 'Admin\UsuariosController@editar')->name('usuarios');        
	});
});

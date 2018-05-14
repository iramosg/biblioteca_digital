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

//Página Inicial
Route::get('/', 'HomeController@index')->name('index');


//Rotas referente ao Login
Route::prefix('login')->as('login.')->group(function(){
	//Página de Login
	Route::get('', 'LoginController@index')->name('index');
	//Página de Esqueci Minha Senha
	Route::get('esqueci-minha-senha', 'LoginController@esqueciminhasenha')->name('esqueciminhasenha'); 
	//Página de Cadastro
	Route::get('cadastrar', 'UsuariosController@cadastrar')->name('cadastrar'); 


	//Método para Entrar
	Route::post('entrar', 'LoginController@entrar')->name('entrar'); 
	
	
	Route::get('facebook', 'LoginController@redirectToProvider');
	Route::get('facebook/callback', 'LoginController@handleProviderCallback');
});



//Rotas do Painel Administrativo
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
		Route::get('editar/{id}', 'Admin\CategoriasController@edit')->name('editar');    
		Route::get('cadastrar', 'Admin\CategoriasController@create')->name('cadastrar');

		Route::post('save', 'Admin\CategoriasController@store')->name('store');    
		Route::post('edit', 'Admin\CategoriasController@update')->name('edit');    
	});
	
	Route::prefix('usuarios')->as('usuarios.')->group(function(){
		Route::get('administradores', 'Admin\UsuariosController@admin')->name('admin');    
		Route::get('usuarios', 'Admin\UsuariosController@usuarios')->name('usuarios');
		Route::get('editar/{id}', 'Admin\UsuariosController@editar')->name('editar');    
		Route::get('cadastrar', 'Admin\UsuariosController@create')->name('cadastrar'); 

		Route::post('edit', 'Admin\UsuariosController@update')->name('edit');    
		Route::post('save', 'Admin\UsuariosController@store')->name('save');    
		
	});
});

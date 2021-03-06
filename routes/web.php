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
Route::get('escritor', 'HomeController@escritor')->name('escritor');
Route::get('leitor', 'HomeController@leitor')->name('leitor');
Route::get('sobre', 'HomeController@sobre')->name('sobre');
Route::post('buscar', 'HomeController@buscar')->name('buscar');

//Rotas referente ao Login
Route::prefix('login')->as('login.')->group(function(){
	//Página de Login
	Route::get('', 'LoginController@index')->name('index');
	//Página de Esqueci Minha Senha
	Route::get('esqueci-minha-senha', 'LoginController@esqueciminhasenha')->name('esqueciminhasenha'); 
	//Página de Cadastro
	Route::get('cadastrar', 'UsuariosController@cadastrar')->name('cadastrar'); 
	
	//Método de Resetar a Senha
	Route::post('resetarsenha', 'LoginController@resetarsenha')->name('resetarsenha');
	//Método de Cadastro(Salvar)
	Route::post('store', 'UsuariosController@store')->name('store');
	//Método para Entrar
	Route::post('entrar', 'LoginController@entrar')->name('entrar');
	//Método para fazer Logout 
	Route::get('logout', 'LoginController@logout')->name('logout'); 
	
	//API de Login com Rede Social
	Route::get('facebook', 'LoginController@redirectToProvider')->name('facebook');
	Route::get('facebook/callback', 'LoginController@handleProviderCallback')->name('cbfacebook');
});

Route::prefix('categoria')->as('categoria.')->group(function(){
	//Página de Login
	Route::get('{url_amigavel}', 'CategoriasController@index')->name('index');
	Route::post('buscar', 'CategoriasController@buscarLivro')->name('buscar');
	
});


Route::prefix('livros')->as('livros.')->group(function(){
	//Página de Login
	Route::get('listar', 'LivrosController@index')->name('index');
	Route::get('page/{url_amigavel}', 'LivrosController@livro')->name('livro');
	Route::get('cadastrar', 'LivrosController@create')->name('cadastrar');
	Route::post('editar', 'LivrosController@editar')->name('editar');
	
	Route::post('buscar', 'LivrosController@livroBusca')->name('buscar');
	Route::post('save', 'LivrosController@store')->name('save');
	Route::post('edit', 'LivrosController@update')->name('edit');
	
	Route::post('page/{url_amigavel}/ranking','RankingLivroController@ranking')->name('ranking');
	Route::post('page/{url_amigavel}/reranking','RankingLivroController@reranking')->name('reranking');
	
	Route::get('page/{url_amigavel}/favoritar', 'FavoritarLivroController@favoritar')->name('favoritar');
	Route::get('page/{url_amigavel}/desfavoritar', 'FavoritarLivroController@desfavoritar')->name('desfavoritar');
	
	
});

Route::prefix('perfil')->as('perfil.')->group(function(){
	//Página de Perfil
	Route::get('usuario/{url_amigavel}', 'PerfilController@index')->name('index');
	Route::get('editar', 'PerfilController@editar')->name('editar');
	
	Route::post('edit', 'PerfilController@edit')->name('edit');
	
	//Página Alterar senha
	Route::get('mudarsenha', 'UsuariosController@mudarsenha')->name('mudarsenha');
	//Método Alterar senha
	Route::post('alterarsenha', 'UsuariosController@alterarsenha')->name('alterarsenha');
	
	Route::prefix('amigo')->as('amigo.')->group(function(){
		Route::post('adicionar', 'SeguidoresController@adicionar')->name('adicionar');
		Route::post('remover', 'SeguidoresController@remover')->name('remover');
	});
	
	Route::prefix('publicar')->as('publicar.')->group(function(){
		Route::post('save', 'PublicacaoController@save')->name('save');
		Route::post('delete', 'PublicacaoController@delete')->name('delete');
	});
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

//Rotas referente a envio de emails
Route::prefix('mail')->as('mail.')->group(function(){
	Route::post('sendbasicemail','MailController@resetarsenha')->name('resetarsenha');
	Route::get('sendhtmlemail','MailController@html_email');
	Route::get('sendattachmentemail','MailController@attachment_email');
});
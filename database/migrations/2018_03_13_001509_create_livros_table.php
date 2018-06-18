<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivrosTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('autor_id')->unsigned();
            $table->foreign('autor_id')->references('id')->on('autores'); 

            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias'); 
            
            $table->string('titulo');
            $table->string('capa');
            $table->year('ano');
            $table->text('sinopse');            	
            $table->text('descricao');            	
            $table->decimal('preco', 8, 2);  
            $table->string('download_previo');            	
            $table->string('download');            	            
            $table->string('isbn', 13)->nullable();  
            $table->string('url_amigavel', 50)->unique();  

            
            $table->boolean('activated')->default(true);          	                       	            
            $table->timestamp('created')->userCurrent();
            $table->timestamp('updated')->nullable();
            $table->integer('userIdCreated');
            $table->integer('userIdUpdated')->nullable();
        });
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
}

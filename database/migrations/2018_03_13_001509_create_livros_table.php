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

            $table->integer('id_autor')->unsigned();
            $table->foreign('id_autor')->references('id')->on('autores'); 

            $table->string('titulo', 300);
            $table->year('ano');
            $table->text('descricao');            	
            $table->decimal('preco', 8, 2);  
            $table->string('download_previo');            	
            $table->string('download');            	            
            $table->string('isbn', 13)->nullable();  
            
            $table->boolean('actived')->default(true);          	                       	            
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

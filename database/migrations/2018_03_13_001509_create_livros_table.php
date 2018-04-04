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
            $table->integer('id_autor')->length(8); 
            $table->string('titulo', 300);
            $table->year('ano');
            $table->text('descricao');            	
            $table->decimal('preco', 8, 2);  
            $table->string('download_previo');            	
            $table->string('download');            	            
            $table->string('isbn', 13);            	                       	            
            $table->timestamps();
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankingLivrosTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('ranking_livros', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios'); 
            
            $table->integer('livro_id')->unsigned();
            $table->foreign('livro_id')->references('id')->on('livros'); 
            
            $table->integer('ranking');
            
            $table->timestamp('created_at')->userCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('ranking_livros');
    }
}

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
            $table->integer('id_usuario')->length(8);            
            $table->integer('id_livro')->length(8); 
            $table->integer('ranking')->length(5); 
            
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
        Schema::dropIfExists('ranking_livros');
    }
}

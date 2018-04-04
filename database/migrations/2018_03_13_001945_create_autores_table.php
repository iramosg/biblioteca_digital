<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_livro')->length(8);                                                                                           
            $table->integer('id_usuario')->length(8);                                                                                           
            $table->string('nome', 100);                                                                                           
            $table->string('sobrenome', 100);                                                                                           
            $table->text('descricao');                                                                                           
            
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
        Schema::dropIfExists('autores');
    }
}

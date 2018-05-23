<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacoesUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacoes_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idiomas');
            $table->string('formacao_academica');
            $table->string('experiencia_profissional');
            
            
            
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
        Schema::dropIfExists('informacoes_usuarios');
    }
}

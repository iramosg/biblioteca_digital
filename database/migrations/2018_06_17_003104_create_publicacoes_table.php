<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicacoesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('publicacoes', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('perfil_id')->unsigned();
            $table->foreign('perfil_id')->references('id')->on('usuarios'); 
            
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios'); 
            
            $table->text('post');
            
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
        Schema::dropIfExists('publicacoes');
    }
}

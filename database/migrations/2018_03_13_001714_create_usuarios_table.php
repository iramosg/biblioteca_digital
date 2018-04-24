<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_usuario_id')->unsigned();
            $table->foreign('tipo_usuario_id')->references('id')->on('tipos_usuarios');
            
            $table->integer('assinatura_id')->unsigned();
            $table->foreign('assinatura_id')->references('id')->on('tipos_assinaturas');
            
            $table->string('nome');            
            $table->string('sobrenome');            
            $table->string('senha');            
            $table->string('email')->unique();            
            $table->string('foto')->nullable();            
            $table->string('capa')->nullable();                       
            $table->string('url_amigavel', 30);   
            $table->rememberToken();     
            
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
        Schema::dropIfExists('usuarios');
    }
}

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

            $table->integer('redes_sociais_id')->nullable()->unsigned();
            $table->foreign('redes_sociais_id')->references('id')->on('redes_sociais_usuarios');
            
            $table->string('nome');            
            $table->string('sobrenome');            
            $table->text('sobre');            
            $table->string('data_nascimento');            
            $table->string('telefone');            
            $table->string('senha');            
            $table->string('email')->unique();            
            $table->string('foto')->nullable();            
            $table->string('capa')->nullable();                       
            $table->string('url_amigavel', 30)->unique();   
            $table->rememberToken();     
            
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
        Schema::dropIfExists('usuarios');
    }
}

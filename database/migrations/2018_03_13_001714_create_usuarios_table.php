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
            $table->string('nome', 100);            
            $table->string('sobrenome', 300);            
            $table->string('senha', 100);            
            $table->string('email', 200)->unique(); 
            $table->string('tipo')->default('leitor');            
            $table->string('foto')->nullable();            
            $table->string('capa')->nullable();            
            $table->string('assinatura')->nullable();            
            $table->string('url_amigavel', 50);            
            
            $table->boolean('actived')->default(true);
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
        Schema::dropIfExists('usuarios');
    }
}

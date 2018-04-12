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
            $table->string('nome', 300);            
            $table->string('sobrenome', 300);            
            $table->string('senha', 100);            
            $table->string('email', 200)->unique(); 
            $table->string('tipo', 25);            
            $table->string('foto', 100);            
            $table->string('capa', 100);            
            $table->string('assinatura', 25);            
            $table->string('url_amigavel', 30);            

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

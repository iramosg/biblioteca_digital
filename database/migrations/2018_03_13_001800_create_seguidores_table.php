<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguidoresTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('seguidores', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios');   
            
            $table->integer('amigo_id')->unsigned();
            $table->foreign('amigo_id')->references('id')->on('usuarios');                                                                                           
            
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
        Schema::dropIfExists('seguidores');
    }
}

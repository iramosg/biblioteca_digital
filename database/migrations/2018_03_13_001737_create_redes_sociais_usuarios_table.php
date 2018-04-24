<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedesSociaisUsuariosTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('redes_sociais_usuarios', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            
            $table->string('facebook')->nullable();                                               
            $table->string('twitter')->nullable();                                               
            $table->string('google_plus')->nullable();
            $table->string('instragram')->nullable();  
            $table->string('tumblr')->nullable();                                               
            $table->string('blog')->nullable();                                                
            $table->string('site')->nullable();                                                
            $table->string('linkedin')->nullable();                                                                              
            $table->string('vk')->nullable();                                                                           
            
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
        Schema::dropIfExists('redes_sociais_usuarios');
    }
}

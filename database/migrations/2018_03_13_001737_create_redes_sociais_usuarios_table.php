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

            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('usuarios');

            $table->string('facebook', 100)->nullable();                                               
            $table->string('twitter', 100)->nullable();                                               
            $table->string('google_plus', 100)->nullable();
            $table->string('instragram', 100)->nullable();  
            $table->string('tumblr', 100)->nullable();                                               
            $table->string('blog', 100)->nullable();                                                
            $table->string('site', 100)->nullable();                                                
            $table->string('linkedin', 100)->nullable();                                                                              
            $table->string('vk', 100)->nullable();                                                                           

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

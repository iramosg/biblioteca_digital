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
            $table->integer('id_usuario')->length(8);
            $table->string('facebook', 100);                                                
            $table->string('twitter', 100);                                                
            $table->string('google_plus', 100);  
            $table->string('instragram', 100);  
            $table->string('tumblr', 100);                                                
            $table->string('blog', 100);                                                
            $table->string('site', 100);                                                
            $table->string('linkedin', 100);                                                                               
            $table->string('vk', 100);                                                                               
                                                          
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
        Schema::dropIfExists('redes_sociais_usuarios');
    }
}

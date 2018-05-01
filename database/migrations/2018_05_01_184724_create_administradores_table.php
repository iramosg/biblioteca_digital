<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administradores', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nome');            
            $table->string('sobrenome');            
            $table->string('senha');            
            $table->string('email')->unique();            
            $table->string('foto')->nullable();            
            $table->string('capa')->nullable();                       
            $table->string('url_amigavel', 30);   
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
        Schema::dropIfExists('administradores');
    }
}

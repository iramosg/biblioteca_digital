<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateErrosTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('erros', function (Blueprint $table) {
            $table->increments('id');
            $table->text('logErro')->nullable();
            $table->text('pagina')->nullable();
            $table->text('metodo')->nullable();
            $table->timestamp('created')->userCurrent();
            $table->string('userIdCreated')->nullable();
        });
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('erros');
    }
}
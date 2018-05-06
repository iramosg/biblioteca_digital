<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categoria');
            $table->string('icone');
            $table->integer('bid')->nullable();      
            
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
        Schema::dropIfExists('categorias');
    }
}

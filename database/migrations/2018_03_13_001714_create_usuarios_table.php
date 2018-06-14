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
            
            $table->string('nome')->nullable();            
            $table->string('sobrenome')->nullable();            
            $table->text('sobre')->nullable();            
            $table->string('data_nascimento')->nullable();            
            $table->string('telefone')->nullable();            
            $table->string('senha')->default('');            
            $table->string('email')->unique();            
            $table->string('foto')->nullable();            
            $table->string('capa')->nullable();                       
            $table->string('url_amigavel', 30)->unique()->nullable();  
            $table->string('facebook')->nullable(); 
            $table->string('youtube')->nullable(); 
            $table->string('instagram')->nullable(); 
            $table->string('site')->nullable();  
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

<?php

use Illuminate\Database\Seeder;

class AdministradoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administradores')->truncate();
        
        DB::table('administradores')->insert([
            ['nome' => 'Igor',
            'sobrenome' => 'Ramos',
            'email' => 'igor.ramos@live.com',
            'senha' => Hash::make('17081996'),
            'remember_token' => str_random(20),
            'userIdCreated' => 1]
        ]);
    }
}

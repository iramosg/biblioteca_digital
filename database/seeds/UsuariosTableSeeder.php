<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->truncate();
        
        DB::table('usuarios')->insert([
            ['nome' => 'Igor',
            'sobrenome' => 'Ramos',
            'email' => 'igor.ramos@live.com',
            'senha' => Hash::make('17081996'),
            'tipo' => 'admin',
            'url_amigavel' => 'igorrg',
            'assinatura' => 'admin'],
        ]);
    }
}

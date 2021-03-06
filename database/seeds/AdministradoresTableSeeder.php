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

        DB::table('administradores')->insert([
            ['nome' => 'Felipe',
            'sobrenome' => 'Miconi',
            'email' => 'felipe_miconi@hotmail.com',
            'senha' => Hash::make('123456'),
            'remember_token' => str_random(20),
            'userIdCreated' => 1]
        ]);

        DB::table('administradores')->insert([
            ['nome' => 'Fernando',
            'sobrenome' => 'Hideki',
            'email' => 'fehiya@gmail.com',
            'senha' => Hash::make('123456'),
            'remember_token' => str_random(20),
            'userIdCreated' => 1]
        ]);

        DB::table('administradores')->insert([
            ['nome' => 'Bruno',
            'sobrenome' => 'Nunes',
            'email' => 'brunonunessantos919@gmail.com',
            'senha' => Hash::make('123456'),
            'remember_token' => str_random(20),
            'userIdCreated' => 1]
        ]);

        DB::table('administradores')->insert([
            ['nome' => 'Cinthia',
            'sobrenome' => 'Inhaia',
            'email' => 'csinhaia@gmail.com',
            'senha' => Hash::make('123456'),
            'remember_token' => str_random(20),
            'userIdCreated' => 1]
        ]);
    }
}

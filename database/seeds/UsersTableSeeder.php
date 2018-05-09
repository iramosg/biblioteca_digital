<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->truncate();

        $faker = Faker\Factory::create();

        for ($i = 0; $i <= 10; $i++){

        DB::table('usuarios')->insert([
            'nome' => $faker->firstName,
            'sobrenome' => $faker->lastName,
            'senha' => Hash::make('123'),
            'email' => $faker->email,
            'foto' => 'http://lorempixel.com/256/256',
            'capa' => 'http://lorempixel.com/1920/1080/',
            'remember_token' => str_random(20),
            'userIdCreated' => 1,
            'tipo_usuario_id' => 2,
            'assinatura_id' => 1,
            'url_amigavel' => str_random(5)            
        ]);
        }
    }
}

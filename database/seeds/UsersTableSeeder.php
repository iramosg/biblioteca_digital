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

        for ($i = 1; $i <= 10; $i++){

        DB::table('usuarios')->insert([
            'redes_sociais_id' => $i,  
            'nome' => $faker->firstName,
            'sobrenome' => $faker->lastName,
            'senha' => Hash::make('123'),
            'email' => $faker->email,
            'foto' => 'https://picsum.photos/256/256',
            'capa' => 'https://picsum.photos/1920/1080',
            'remember_token' => str_random(20),
            'userIdCreated' => $i,
            'url_amigavel' => str_random(5)
                      
        ]);
        }
    }
}

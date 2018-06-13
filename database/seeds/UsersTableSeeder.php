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
            'nome' => $faker->firstName,
            'sobrenome' => $faker->lastName,
            'senha' => Hash::make('123'),
            'email' => $faker->email,
            'foto' => 'https://picsum.photos/200/200',
            'capa' => 'https://picsum.photos/1200/300',
            'sobre' => 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.',
            'data_nascimento' => $faker->date,
            'telefone' => '(99) 99999-9999',
            'facebook' => '@face',
            'youtube' => '@twitter',
            'instagram' => '@insta',
            'site' => 'www.meusite.com.br',
            'remember_token' => str_random(20),
            'userIdCreated' => $i,
            'url_amigavel' => str_random(5)
                      
        ]);
        }
    }
}

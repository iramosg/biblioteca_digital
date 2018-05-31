<?php

use Illuminate\Database\Seeder;

class LivroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('livros')->truncate();

        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 50; $i++){

        DB::table('livros')->insert([
            'autor_id' => $faker->numberBetween($min = 1, $max = 10),
            'categoria_id' => $faker->numberBetween($min = 1, $max = 10),
            'titulo' => $faker->sentence($nbWords = 4, $variableNbWords = true),
            'capa' => 'http://lorempixel.com/200/200',
            'ano' => $faker->year,
            'descricao' => $faker->text($maxNbChars = 200),
            'preco' => $faker->numberBetween($min = 10, $max = 1000),
            'download_previo' => $faker->word,
            'download' => $faker->word,
            'userIdCreated' => $faker->numberBetween($min = 1, $max = 10)

        ]);
       }
    }
}

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
            'capa' => 'https://picsum.photos/400/500',
            'ano' => $faker->year,
            'descricao' => $faker->text($maxNbChars = 200),
            'preco' => $faker->numberBetween($min = 10, $max = 1000),
            'download_previo' => $faker->word,
            'download' => $faker->word,
            'url_amigavel' => $faker->unique()->word(),
            'userIdCreated' => 1

        ]);
       }
    }
}

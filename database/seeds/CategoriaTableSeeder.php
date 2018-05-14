<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->truncate();

        $faker = Faker\Factory::create();        

        DB::table('categorias')->insert([
            'categoria' => 'Animais',
            'icone' => 'http://lorempixel.com/20/20',
            'userIdCreated' => $faker->numberBetween($min = 1, $max = 10)
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Business',
            'icone' => 'http://lorempixel.com/20/20',
            'userIdCreated' => $faker->numberBetween($min = 1, $max = 10)
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Culinaria',
            'icone' => 'http://lorempixel.com/20/20',
            'userIdCreated' => $faker->numberBetween($min = 1, $max = 10)
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Cursos',
            'icone' => 'http://lorempixel.com/20/20',
            'userIdCreated' => $faker->numberBetween($min = 1, $max = 10)
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Educacionais',
            'icone' => 'http://lorempixel.com/20/20',
            'userIdCreated' => $faker->numberBetween($min = 1, $max = 10)
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Estilo de Vida',
            'icone' => 'http://lorempixel.com/20/20',
            'userIdCreated' => $faker->numberBetween($min = 1, $max = 10)
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Historias',
            'icone' => 'http://lorempixel.com/20/20',
            'userIdCreated' => $faker->numberBetween($min = 1, $max = 10)
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Idiomas',
            'icone' => 'http://lorempixel.com/20/20',
            'userIdCreated' => $faker->numberBetween($min = 1, $max = 10)
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Mais Vendidos',
            'icone' => 'http://lorempixel.com/20/20',
            'userIdCreated' => $faker->numberBetween($min = 1, $max = 10)
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Outros',
            'icone' => 'http://lorempixel.com/20/20',
            'userIdCreated' => $faker->numberBetween($min = 1, $max = 10)
        ]);
      
    }
}

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
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Business',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Culinaria',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Cursos',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Educacionais',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Estilo de Vida',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Historias',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Idiomas',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Mais Vendidos',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Outros',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'userIdCreated' => 1
        ]);
      
    }
}

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
            'url_amigavel' => 'animais',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Business',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'url_amigavel' => 'business',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Culinária',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'url_amigavel' => 'culinaria',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Cursos',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'url_amigavel' => 'cursos',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Educacionais',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'url_amigavel' => 'educacionais',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Estilo de Vida',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'url_amigavel' => 'estilo-de-vida',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Histórias',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'url_amigavel' => 'historias',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Idiomas',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'url_amigavel' => 'idiomas',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Mais Vendidos',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'url_amigavel' => 'mais-vendidos',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Outros',
            'icone' => 'https://picsum.photos/50/50',
            'banner' => 'https://picsum.photos/1680/300',
            'url_amigavel' => 'outros',
            'userIdCreated' => 1
        ]);
      
    }
}

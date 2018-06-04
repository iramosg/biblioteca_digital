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
            'icone' => 'categorias/icones/N0sMz5ngN2PFH6juf1S1l24KlC5zJ9UFCKs7FCT3.png',
            'banner' => 'categorias/banners/yC8s0Lp5Vpj523GJS3dwdvqoHSC505VDzsTvxGVp.jpeg',
            'url_amigavel' => 'animais',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Business',
            'icone' => 'categorias/icones/pbxJ18WN5g9PIJ96WMuB6iEn2Y8BVmBn8qkljbG1.png',
            'banner' => 'categorias/banners/LRYBTAMX3VFiuAp5edIEVrJRX1FLgtvNYtvga1RT.jpeg',
            'url_amigavel' => 'business',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Culinária',
            'icone' => 'categorias/icones/nc5AYGItlVApRJQo4MGPbvH9j4PZvT16lTEz2tKr.png',
            'banner' => 'categorias/banners/mg17QaXMTp3dxCAMQfGWhdiVuhl8TzF8CmMNYWrm.jpeg',
            'url_amigavel' => 'culinaria',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Cursos',
            'icone' => 'categorias/icones/Q00kt9Db4HWbbFn8L7AnKg8zdewAMYhbNCvVUZYF.png',
            'banner' => 'categorias/banners/Bi29F44h2WAF5vQyqCm3P74AHfAIzGDw1FYmQiO3.jpeg',
            'url_amigavel' => 'cursos',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Educacionais',
            'icone' => 'categorias/icones/TZWGprLdu1evzr3aJuY79tHlw5jEGvEeUTEGgOUi.png',
            'banner' => 'categorias/banners/WfzYFvIyYaJJEH1dWlo1CHKwW8jRHKSiFmmUx155.jpeg',
            'url_amigavel' => 'educacionais',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Estilo de Vida',
            'icone' => 'categorias/icones/pqCCc6vRqG7AYOuVgak1FRksaMPeL3FDM3A4qPOI.png',
            'banner' => 'https://picsum.photos/1680/300',
            'url_amigavel' => 'estilo-de-vida',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Histórias',
            'icone' => 'categorias/icones/228mCNvRYyrTYJCVdwHsVQOGbnHUPQXscUk4N2Lf.png',
            'banner' => 'categorias/banners/4OzpgLPQQMChy7APPGiDgZqANaXMNCiJp90HyetS.jpeg',
            'url_amigavel' => 'historias',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Idiomas',
            'icone' => 'categorias/icones/rdI7T4lyB1YCeSv8jnBjfGPtMeP3sYlubAFahkq7.png',
            'banner' => 'categorias/banners/hzKDAV7n1YZ112NehQprIFgJzbCjCTq5b7EtgO5b.jpeg',
            'url_amigavel' => 'idiomas',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Mais Vendidos',
            'icone' => 'categorias/icones/0hz8IazlYXJ3eM4Pstzum4OYYd2wSNHO2yzrUvWG.png',
            'banner' => 'categorias/banners/hQsJDXTs6M8mecbOCbjNUoxAU8QaSXyUi7JTKFPQ.jpeg',
            'url_amigavel' => 'mais-vendidos',
            'userIdCreated' => 1
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Outros',
            'icone' => 'categorias/icones/ju98HcuL8jy3Vc2XMh0isUzP3BexqMuMriCRhSGw.png',
            'banner' => 'categorias/banners/ZlTKk7wFY3tvv9z8PXC08ocyfGx8aHoW8L8KQMGA.jpeg',
            'url_amigavel' => 'outros',
            'userIdCreated' => 1
        ]);
      
    }
}

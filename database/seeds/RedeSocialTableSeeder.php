<?php

use Illuminate\Database\Seeder;

class RedeSocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('redes_sociais_usuarios')->truncate();

        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++){

        DB::table('redes_sociais_usuarios')->insert([
            'facebook' => $faker->word,
            'twitter' => $faker->word,
            'google_plus' => $faker->word,
            'instagram' => $faker->word,
            'tumblr' => $faker->word,
            'blog' => $faker->word,
            'site' => $faker->word,
            'linkedin' => $faker->word,
            'vk' => $faker->word,
            'userIdCreated' => $faker->numberBetween($min = 1, $max = 10)          

        ]);
        }
    }
}

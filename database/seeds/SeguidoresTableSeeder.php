<?php

use Illuminate\Database\Seeder;

class SeguidoresTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('seguidores')->truncate();
        
        $faker = Faker\Factory::create();
        
        for ($i = 1; $i <= 50; $i++){
            
            DB::table('seguidores')->insert([
                'usuario_id' => $faker->numberBetween($min = 1, $max = 11), 
                'amigo_id' => $faker->numberBetween($min = 1, $max = 11)
                ]);
            }
        }
    }
    
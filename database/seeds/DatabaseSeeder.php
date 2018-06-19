<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdministradoresTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
        //$this->call(LivroTableSeeder::class);
        $this->call(CategoriaTableSeeder::class);
        //$this->call(SeguidoresTableSeeder::class);
    }
}

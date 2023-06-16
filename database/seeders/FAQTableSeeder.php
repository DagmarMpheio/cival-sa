<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::statement('SET FOREIGN_KEY_CHECKS=0');
       DB::table('faqs')->truncate(); //apagar todos os dados da tabela

        $faker = Factory::create(); //dados falsos(aleatorios)

        //gerar 3 faqs
        DB::table('faqs')->insert([
            [
                'questao' => $faker->paragraph() . "?",
                'resposta' => $faker->text(rand(100, 50)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'questao' => $faker->paragraph() . "?",
                'resposta' => $faker->text(rand(100, 50)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'questao' => $faker->paragraph() . "?",
                'resposta' => $faker->text(rand(100, 50)),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

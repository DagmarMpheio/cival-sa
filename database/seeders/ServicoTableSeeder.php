<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('servicos')->truncate(); //apagar todos os dados da tabela

        $faker = Factory::create(); //dados falsos(aleatorios)

        //gerar 3 servicos
        DB::table('servicos')->insert([
            [
                'servico' => $faker->paragraph(1),
                'descricao' => $faker->text(rand(400, 300)),
                'preco' => $faker->randomFloat(2,100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'servico' => $faker->paragraph(1),
                'descricao' => $faker->text(rand(400, 300)),
                'preco' => $faker->randomFloat(2,100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'servico' => $faker->paragraph(1),
                'descricao' => $faker->text(rand(400, 300)),
                'preco' => $faker->randomFloat(2,100),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

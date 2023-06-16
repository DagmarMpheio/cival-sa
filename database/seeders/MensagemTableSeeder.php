<?php

namespace Database\Seeders;

use App\Models\Mensagem;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MensagemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('faqs')->truncate(); //apagar todos os dados da tabela

        $faker = Factory::create(); //dados falsos(aleatorios)

        #criar 5 mensagens aleatorias
        for ($i = 1; $i <= 5; $i++) {
            $mensagem = new Mensagem();
            $mensagem->name = $faker->name();
            $mensagem->email = $faker->email();
            $mensagem->assunto = $faker->text(20);
            $mensagem->mensagem = $faker->paragraph(1);
            $mensagem->save();
        }
    }
}

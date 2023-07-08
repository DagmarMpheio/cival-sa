<?php

namespace Database\Seeders;

use App\Models\FAQS;
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

        #criar 3 faqs aleatorias
        for ($i = 1; $i <= 3; $i++) {
            $faq = new FAQS();
            $faq->questao = $faker->text(rand(100, 100)) . "?";
            $faq->resposta = $faker->text(rand(200, 200));
            $faq->save();
        }
    }
}

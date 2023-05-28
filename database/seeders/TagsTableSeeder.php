<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //apagar tudo da tabela tags
        DB::table('tags')->truncate(); //apagar todos os dados da tabela
        //apagar tudo da tabela post_tag
        DB::table('post_tag')->truncate(); //apagar todos os dados da tabela

        $viatura = new Tag();
        $viatura->name = "Viatura";
        $viatura->slug = "viatura";
        $viatura->save();

        $inspecao = new Tag();
        $inspecao->name = "Inspenção";
        $inspecao->slug = "inspencao";
        $inspecao->save();

        $matricula = new Tag();
        $matricula->name = "Matricula";
        $matricula->slug = "matricula";
        $matricula->save();

        $huila = new Tag();
        $huila->name = "Huíla";
        $huila->slug = "huila";
        $huila->save();

        $lubango = new Tag();
        $lubango->name = "Lubango";
        $lubango->slug = "lubango";
        $lubango->save();

        $estrada = new Tag();
        $estrada->name = "Estrada";
        $estrada->slug = "estrada";
        $estrada->save();

        $viacao_e_transito = new Tag();
        $viacao_e_transito->name = "Viação e Trânsito";
        $viacao_e_transito->slug = "viacao-e-transito";
        $viacao_e_transito->save();

        $acidente = new Tag();
        $acidente->name = "Acidente";
        $acidente->slug = "acidente";
        $acidente->save();

        $pelicula = new Tag();
        $pelicula->name = "Película";
        $pelicula->slug = "pelicula";
        $pelicula->save();

        $tags = [
            $viatura->id,
            $inspecao->id,
            $matricula->id,
            $acidente->id,
        ];
        //relacionar tags com posts
        foreach (Post::all() as $post) {
            shuffle($tags);
            for ($i = 0; $i < rand(0, count($tags) - 1); $i++) {
                $post->tags()->detach($tags[$i]);
                $post->tags()->attach($tags[$i]);
            }
        }
    }
}

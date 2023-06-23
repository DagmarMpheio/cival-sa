<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('categorias')->truncate(); //apagar todos os dados da tabela

        DB::table('categorias')->insert([
            [
                'title' => 'Sem Categoria',
                'slug' => 'sem-categoria',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Inspenção Automóvel',
                'slug' => 'inspencao-automovel',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Segurança Rodoviária',
                'slug' => 'seguranca-rodoviaria',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'News',
                'slug' => 'news',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Legislação',
                'slug' => 'legislacao',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Anúncios',
                'slug' => 'anuncios',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        //actualizar os dados da tabela posts
        //        for ($post_id = 1; $post_id <= 36; $post_id++) {
        $categorias = Categoria::pluck('id');
        foreach (Post::pluck('id') as $postId) {

            $categoryId = $categorias[rand(0, $categorias->count() - 1)];

            DB::table('posts')
                ->where('id', $postId)
                ->update(['category_id' => $categoryId]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        //add comentario
        foreach (Post::all() as $post) {
            for ($i = 0; $i < rand(0, count(Post::all()) - 1); $i++) {
                $comentario = new Comment();
                $comentario->author_name = $faker->name();
                $comentario->author_email = $faker->email();
                $comentario->author_url = $faker->url();
                $comentario->body = $faker->text();
                $comentario->post_id = $post->id;
                $comentario->save();
            }
        }
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Dagmar Mpheio
 * Date: 10/23/2020
 * Time: 12:18 AM
 */

namespace App\Views\Composers;

use Carbon\Carbon;
use Illuminate\View\View;
use App\Models\Categoria;
use App\Models\Post;
use App\Models\Tag;

class NavigationComposer
{

    public function compose(View $view)
    {

        $this->composeCategories($view);

        $this->composePopularPosts($view);

        $this->composeTags($view);

        $this->composeArchives($view);


    }

    private function composeCategories(View $view)
    {
        $categories = Categoria::with(['posts' => function ($query) {
            $query->published();
        }])->orderBy('title', 'asc')->get();

        $view->with('categories', $categories);

    }

    private function composePopularPosts(View $view)
    {
        $popularPosts = Post::published()->popular()->take(3)->get();
        $view->with('popularPosts', $popularPosts);
    }

    private function composeTags(View $view)
    {
        $tags = Tag::has('posts')->get();
        $view->with('tags', $tags);
    }

    private function composeArchives(View $view)
    {

        $archives = Post::archives();

        $view->with('archives', $archives);
    }
}
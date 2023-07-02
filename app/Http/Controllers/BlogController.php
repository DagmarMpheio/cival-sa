<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        /* die('blog index');*/

        $posts = Post::with('author', 'tags', 'category', 'comments')
            ->latest()
            ->published()
            ->filter(request()->only(['term', 'year', 'month']))
            ->simplePaginate(3);

        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        /*  $post = Post::published()->findOrFail($id);*/
        //actualizar os posts(posts mais lidos) definir view_count = view_count+1 where id = ?

        #2
        $post->increment('view_count');

        $postComments = $post->comments()->simplePaginate(3);

        return view("blog.show", compact('post','postComments'));
    }

    public function category(Categoria $category)
    {
        $categoryName = $category->title;

        $posts = $category->posts()
            ->with('author', 'tags', 'comments')
            ->latest()
            ->published()
            ->simplePaginate(3);

        return view('blog.index', compact('posts', 'categoryName'));

        /*$posts = Post::with('author')
           ->latest()
           ->published()
           ->where('category_id', $id)
           ->simplePaginate(3);*/
    }

    public function tag(Tag $tag)
    {
        $tagName = $tag->name;

        $posts = $tag->posts()
            ->with('author', 'category', 'comments')
            ->latest()
            ->published()
            ->simplePaginate(3);

        return view('blog.index', compact('posts', 'tagName'));

        /*$posts = Post::with('author')
           ->latest()
           ->published()
           ->where('category_id', $id)
           ->simplePaginate(3);*/
    }

    /*metodo para retornar o autor*/
    public function author(User $author)
    {
        $authorName = $author->name;

        $posts = $author->posts()
            ->with('category', 'tags', 'comments')
            ->latest()
            ->published()
            ->simplePaginate(3);
        return view('blog.index', compact('posts', 'authorName'));
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Comment\CommentStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends AdminController
{
    //
    public function store(Post $post, CommentStoreRequest $request)
    {
        /* $data = $request->all();
         $data['post_id'] = $post->id;

         Comment::create($data);*/

        /*$post->comments()->create($request->all());*/
        $post->createComment($request->all());

        return redirect()->back()->with('message', "O seu comentário foi enviado com sucesso!");
    }
}

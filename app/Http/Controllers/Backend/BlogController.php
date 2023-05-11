<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends AdminController
{
    protected $uploadPath;

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path(config('cms.image.directory'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $onlyTrashed = false;

        if (($status = $request->get('status')) && $status == 'reciclagem') {
            $postCount = Post::onlyTrashed()->count();
            $posts = Post::onlyTrashed()->with('category', 'author')->latest()->simplePaginate(7);
            $onlyTrashed = true;
        } else if ($status == 'publicado') {
            $postCount = Post::published()->count();
            $posts = Post::published()->with('category', 'author')->latest()->simplePaginate(7);
        } else if ($status == 'agendado') {
            $postCount = Post::scheduled()->count();
            $posts = Post::scheduled()->with('category', 'author')->latest()->simplePaginate(7);
        } else if ($status == 'rascunho') {
            $postCount = Post::draft()->count();
            $posts = Post::draft()->with('category', 'author')->latest()->simplePaginate(7);
        } else if ($status == 'particulares') {
            $postCount = $request->user()->posts()->count();
            $posts = $request->user()->posts()->with('category', 'author')->latest()->simplePaginate(7);
        } else {
            $postCount = Post::count();
            $posts = Post::with('category', 'author')->latest()->simplePaginate(7);
        }

        $statusList = $this->statusList($request);

        return view('backend.blog.index', compact('posts', 'postCount', 'onlyTrashed', 'statusList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        return view('backend.blog.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'excerpt' => 'required',
            'body' => 'required',
            /*'published_at' => 'date_format:Y-m-d H:i:s'*/
            'category_id' => 'required',
            'image' => 'file|mimes:jpeg,png,jpg,gif,svg|max:8192000000',
        ]);

        $data = $this->handleResquest($request);

        $newPost = $request->user()->posts()->create($data);

        $newPost->createTags($data["post_tags"]);

        return redirect('/backend/blog')->with('message', 'O seu post foi criado com sucesso! ');
    }

    private function handleResquest(Request $request)
    {
        $dados = $request->all(); //pegar todos os dados inseridos pelo usuario

        /*se o usuario se inseriu um ficheiro, faça:*/
        if ($request->hasFile('image')) {
            $image = $request->file('image'); //pega o ficheiro
            $fileName = time() . '.' . $image->getClientOriginalExtension(); //pegar o nome e a extensao do

            $imageResize = Image::make($image->getRealPath())->orientate();
            $imageResize->resize(800, 450);

            /*nome temporarrio */
            $destination = $this->uploadPath; //pasta destino da imagem
            $successUploaded = $imageResize->save($destination . '/' . $fileName); //mover a imagem

            if ($successUploaded) {
                $width = config('cms.image.thumbnail.width');
                $height = config('cms.image.thumbnail.height');

                $extension = $image->getClientOriginalExtension(); //extensao
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName); //renomear a thumnail

                Image::make($destination . '/' . $fileName)
                    ->resize($width, $height)
                    ->save($destination . '/' . $thumbnail);
            }

            $dados['image'] = $fileName; //substituir os dados do campo image com os dados actual
        }

        return $dados;
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view("backend.blog.edit", compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $this->validate($request, [
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            //'published_at' => 'required|date_format:Y-m-d H:i:s',
            'category_id' => 'required',
            'image' => 'file|mimes:jpeg,png,jpg,gif,svg|max:8192000000',
        ]);

        $oldImage = $post->image;
        $oldPublishedDate = $post->published_at;

        $data = $this->handleResquest($request);

        //se a data for nula perma

        $post->update($data);
        $post->createTags($data['post_tags']);

        if ($oldImage !== $post->image) {
            $this->removeImage($oldImage);
        }


        return redirect('/backend/blog')->with('message', 'O seu post foi actualizado com sucesso! ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::findOrFail($id)->delete();

        return redirect('/backend/blog')->with('trash-message', ['O seu post foi movido para a reciclagem!', $id]);
    }

    //restaurar post da reciclagem
    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->back()->with('message', 'O seu post foi removido da reciclagem!');
    }

    //eliminar permanentemente
    public function forceDestroy($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();

        $this->removeImage($post->image); //remove a imagem da bd e do servidor

        return redirect('/backend/blog?status=trash')->with('message', 'O seu post foi excluído com sucesso!');
    }

    //eliminar as imagens
    public function removeImage($image)
    {

        if (!empty($image)) {
            $imagePath = $this->uploadPath . '/' . $image;
            $ext = substr(strchr($image, '.'), 1); //extensao das imagens
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $image);
            $thumbnailPath = $this->uploadPath . '/' . $thumbnail;

            if (file_exists($imagePath)) unlink($imagePath);
            if (file_exists($thumbnailPath)) unlink($thumbnailPath);
        }
    }

    //listar os estados dos posts
    public function statusList($request)
    {
        return [
            'particulares' => $request->user()->posts()->count(),
            'todos' => Post::count(),
            'publicado' => Post::published()->count(),
            'agendado' => Post::scheduled()->count(),
            'rascunho' => Post::draft()->count(),
            'reciclagem' => Post::onlyTrashed()->count()
        ];
    }
}

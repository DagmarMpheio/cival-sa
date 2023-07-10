<?php

namespace App\Http\Controllers;

use App\Models\AlbumFotoDoc;
use App\Models\FAQS;
use App\Models\Mensagem;
use App\Models\Multimedia;
use App\Models\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $faqs = FAQS::orderBy('id')->simplePaginate(3);
        $posts = Post::with('category', 'author')->orderBy('id')->simplePaginate(3);
        $imgs = Multimedia::where('tipo', 'Imagem')->whereHas('album', function ($query) {
            $query->where('nome_album', '!=', 'Nenhum');
        })->with('album')->get();

        $albums = AlbumFotoDoc::where('nome_album', '!=', 'Nenhum')->get();

        //return dd($imgs);
        return view('inicio', compact('posts', 'faqs', 'albums', 'imgs'));
    }

    public function showFaqs()
    {
        $faqs = FAQS::orderBy('questao')->simplePaginate(6);;

        return view('faqs', compact('faqs'));
    }

    public function pesquisar(Request $request)
    {
        $search = $request->s;

        if ($search) {
            $resultado = Post::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
            //return dd($request->s);
            return view('blog.resultado-pesquisa', ['pesquisa' => $search, 'resultado' => $resultado]);
        } else {
            return redirect('/');
        }
    }

    public function mensagem(Request $request)
    {

        $mensagem = new Mensagem();
        $mensagem->name = $request->name;
        $mensagem->email = $request->email;
        $mensagem->assunto = $request->subject;
        $mensagem->mensagem = $request->message;

        if ($mensagem->save()) {
            return redirect()->back()->with('msg', 'MENSAGEM ENVIADA COM SUCESSO#messageForm');
        } else {
            return redirect()->back()->withErrors('errormsg', 'Não foi possível enviar a mensagem#messageForm');
        }
    }

    public function showDocs()
    {
        $docs_inpecao = Multimedia::where('tipo', 'Documento')->where('doc_type', 'Inspeção')->simplePaginate(3);
        $docs_inpecaoCounts = Multimedia::where('tipo', 'Documento')->where('doc_type', 'Inspeção')->count();
        $docs_matricula = Multimedia::where('tipo', 'Documento')->where('doc_type', 'Matrícula')->simplePaginate(3);
        $docs_matriculaCounts = Multimedia::where('tipo', 'Documento')->where('doc_type', 'Matrícula')->count();
        $docs_pelicula = Multimedia::where('tipo', 'Documento')->where('doc_type', 'Película')->simplePaginate(3);
        $docs_peliculaCounts = Multimedia::where('tipo', 'Documento')->where('doc_type', 'Película')->count();

        //return dd($docs);
        return view('documentos', compact('docs_inpecao', 'docs_matricula', 'docs_pelicula', 'docs_inpecaoCounts', 'docs_matriculaCounts', 'docs_peliculaCounts'));
    }
}

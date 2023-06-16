<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Mensagem\MensagemStoreRequest;
use App\Http\Requests\Mensagem\MensagemUpdateRequest;
use App\Models\Mensagem;
use Illuminate\Http\Request;

class MensagemController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensagens = Mensagem::simplePaginate(5);
        $mensagensCount = Mensagem::count();

        return view('backend.mensagem.index', compact('mensagens', 'mensagensCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mensagem = new Mensagem();

        return view('backend.mensagem.create', compact('mensagem'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MensagemStoreRequest $request)
    {
        $data = $request->all();
        $mensagem = Mensagem::create($data);

        return redirect('/backend/mensagens')->with("message", "Nova mensagem inserida com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Mensagem $mensagem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mensagem = Mensagem::findOrFail($id);

        return view('backend.mensagem.edit', compact('mensagem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MensagemUpdateRequest $request, $id)
    {
        $mensagem = Mensagem::findOrFail($id);
        $mensagem->update($request->all());

        return redirect('/backend/mensagens')->with("message", "Mensagem actualizada com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mensagem = Mensagem::findOrFail($id);
        $mensagem->delete();


        return redirect("/backend/mensagens")->with("message", "Mensagem foi excluída com succeso!");
    }
}

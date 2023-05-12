<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Servico\ServicoStoreRequest;
use App\Http\Requests\Servico\ServicoUpdateRequest;
use App\Models\Servico;

class ServicoController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicos = Servico::orderBy('servico')->simplePaginate(5);
        $servicosCount = Servico::count();

        return view('backend.servicos.index', compact('servicos', 'servicosCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servico = new Servico();

        return view('backend.servicos.create', compact('servico'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicoStoreRequest $request)
    {
        $data = $request->all();
        $servico = Servico::create($data);

        return redirect('/backend/servicos')->with("message", "Novo serviço inserido com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Servico $fAQS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $servico = Servico::findOrFail($id);

        return view('backend.servicos.edit', compact('servico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicoUpdateRequest $request, string $id)
    {
        $servico = Servico::findOrFail($id);
        $servico->update($request->all());

        return redirect('/backend/servicos')->with("message", "Serviço actualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $servico = Servico::findOrFail($id);
        $servico->delete();


        return redirect("/backend/servicos")->with("message", "Serviço foi excluído com succeso!");
    }
}

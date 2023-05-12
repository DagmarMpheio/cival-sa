<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Categoria\CategoryStoreRequest;
use App\Http\Requests\Categoria\CategoryUpdateRequest;
use App\Models\Categoria;

class CategoriaController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::with('posts')->orderBy('title')->paginate(5);
        //$categorias = Categoria::orderBy('title')->paginate(5);
        $categoriasCount = Categoria::count();

        return view('backend.categorias.index', compact('categorias', 'categoriasCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoria = new Categoria();

        return view('backend.categorias.create', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        //
        Categoria::create($request->all());

        return redirect('/backend/categorias')->with("message", "Nova categoria inserida com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $categoria = Categoria::findOrFail($id);

        return view('backend.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        //
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());

        return redirect('/backend/categorias')->with("message", "Categoria actualizada com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy(CategoryDestroyResquest $request, $id)
    public function destroy($id)
    {
        //
        //Post::withTrashed()->where('category_id', $id)->update(['category_id' => config('cms.default_category_id')]);

        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect("/backend/categorias")->with("message", "Categoria foi excluída com succeso!");
    }
}

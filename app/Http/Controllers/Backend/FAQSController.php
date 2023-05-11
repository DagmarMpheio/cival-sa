<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FAQS\FAQStoreRequest;
use App\Http\Requests\FAQS\FAQUpdateRequest;
use App\Models\FAQS;
use Illuminate\Http\Request;

class FAQSController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = FAQS::orderBy('questao')->simplePaginate(5);
        $faqsCount = FAQS::count();

        return view('backend.faqs.index', compact('faqs', 'faqsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faq = new FAQS();

        return view('backend.faqs.create', compact('faq'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FAQStoreRequest $request)
    {
        $data = $request->all();
        $faq = FAQS::create($data);

        return redirect('/backend/faqs')->with("message", "Nova pergunta frequente inserida com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(FAQS $fAQS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faq = FAQS::findOrFail($id);

        return view('backend.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FAQUpdateRequest $request, string $id)
    {
        $faq = FAQS::findOrFail($id);
        $faq->update($request->all());

        return redirect('/backend/faqs')->with("message", "Pergunta frequente actualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $faq = FAQS::findOrFail($id);
        $faq->delete();


        return redirect("/backend/faqs")->with("message", "Pergunta frequente foi excluída com succeso!");
    }
}

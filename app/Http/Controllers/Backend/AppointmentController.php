<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\AdminController;
use App\Http\Requests\Appointment\AppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if (($status = $request->get('status')) && $status == 'todos') {
            //todos
            $agendas = Appointment::with(['employee', 'service'])->simplePaginate(5);
            $agendasCount = Appointment::with(['employee', 'service'])->count();
        } else {
            //particulares
            $agendas = Appointment::with(['employee', 'service'])->where('user_id', $request->user()->id)->simplePaginate(5);
            $agendasCount = Appointment::with(['employee', 'service'])->where('user_id', $request->user()->id)->count();
        }

        $statusList = $this->statusList($request);

        //return dd($agendas);
        return view('backend.agendas.index', compact('agendas', 'agendasCount', 'statusList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agenda = new Appointment();
        return view('backend.agendas.create', compact('agenda'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentRequest $request)
    {
        $data = $request->all();
        //$request->user()->appointments()->create($data);
        Appointment::create($data);
        //return dd($request->all());

        return redirect('/backend/agendas')->with("message", "Novo agendamento inserido com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    //public function show(Appointment $appointment)
    public function show(Appointment $appointment)
    {
        //
    }

    public function showCalendar(Request $request)
    {
        //

        //$agendas = Appointment::with(['employee', 'service'])->where('user_id', $request->user()->id)->get();
		$agendas = Appointment::all();
        $agendasCount = Appointment::with(['employee', 'service'])->where('user_id', $request->user()->id)->count();

        return view('backend.agendas.calendar', compact('agendas', 'agendasCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agenda = Appointment::with(['employee', 'service'])->findOrFail($id);

        return view('backend.agendas.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AppointmentRequest $request, string $id)
    {
        $agenda = Appointment::findOrFail($id);
        $agenda->update($request->all());

        return redirect('/backend/agendas')->with("message", "Agendamento actualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agenda = Appointment::findOrFail($id);
        $agenda->delete();

        return redirect("/backend/agendas")->with("message", "Agendamento foi excluído com succeso!");
    }

    //listar os estados dos posts
    public function statusList($request)
    {
        return [
            'particulares' => Appointment::with(['employee', 'service'])->where('user_id', $request->user()->id)->count(),
            'todos' => Appointment::with(['employee', 'service'])->count(),
        ];
    }

    /* public function agendaCalendar()
    {
        $agendas = Appointment::with(['employee', 'service'])->simplePaginate(5);
        $agendasCount = Appointment::with(['employee', 'service'])->count();

        return view('backend.agendas.index', compact('agendas', 'agendasCount'));
    } */
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\WorkingHour\WorkingHourRequest;
use App\Models\WorkingHour;
use Illuminate\Http\Request;

class WorkingHourController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workingHours = WorkingHour::simplePaginate(5);
        $workingHoursCount = WorkingHour::count();
        return view('backend.working-hours.index', compact('workingHours', 'workingHoursCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workingHour = new WorkingHour();
        return view('backend.working-hours.create', compact('workingHour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkingHourRequest $request)
    {
        $data = $request->all();
        $workingHour = WorkingHour::create($data);

        return redirect('/backend/horario-expediente')->with("message", "Hora de expediente inserida com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkingHour $workingHour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkingHour $workingHour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkingHour $workingHour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkingHour $workingHour)
    {
        //
    }
}

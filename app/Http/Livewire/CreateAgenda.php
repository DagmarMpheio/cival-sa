<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Servico;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateAgenda extends Component
{
    public $currentStep = 1;
    public $service_id, $employee_id, $data, $start_time, $comments;
    public $successMessage = '';

    public function render()
    {
        $servicos = Servico::pluck('servico', 'id');
        $atendentes = User::whereHas('roles', function ($query) {
            $query->where('id', '2');
        })->pluck('name', 'id');

         // Calcular os horários disponíveis
         $horariosDisponiveis = [];

         $horarioInicial = Carbon::createFromTime(8, 0); // Horário inicial (8:00)
         $horarioFinal = Carbon::createFromTime(14, 45); // Horário final (14:45)
 
         $horarioAtual = clone $horarioInicial;
 
         while ($horarioAtual <= $horarioFinal) {
             $horariosDisponiveis[] = $horarioAtual->format('H:i');
             $horarioAtual->addMinutes(15);
         }

         $idUsuarioAutenticado = Auth::id();

        return view('livewire.create-agenda',compact('servicos','atendentes','horariosDisponiveis'));
    }

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'service_id' => 'required',
            'employee_id' => 'required',
            'data' => 'required',
            'start_time' => 'required',
            'comments' => 'required',
        ]);

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'stock' => 'required',
            'status' => 'required',
        ]);

        $this->currentStep = 3;
    }


    public function submitForm()
    {
        Product::create([
            'service_id' => $this->service_id,
            'employee_id' => $this->employee_id,
            'data' => $this->data,
            'start_time' => $this->start_time,
            'comments' => $this->comments,

        ]);

        $this->successMessage = 'Producto Criado com Successo.';
        $this->clearForm();
        $this->currentStep = 1;
    }

    public function back($step)
    {
        $this->currentStep = $step;    
    }

    public function clearForm()
    {
        $this->service_id = '';
        $this->employee_id = '';
        $this->data = '';
        $this->start_time = '';
        $this->comments = '';
    }
}

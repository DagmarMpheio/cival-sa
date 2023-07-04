<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Product;
use App\Models\Servico;
use App\Models\User;
use App\Models\Veiculo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateAgenda extends Component
{
    public $currentStep = 1;
    public $service_id, $employee_id, $data, $start_time, $comments; //variaveis do agendamento
    public $marca, $modelo, $matricula, $data_matricula, $tipo_veiculo, $combustivel; //variaveis do veiculo no agendamento
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
        return view('livewire.create-agenda', compact('servicos', 'atendentes', 'horariosDisponiveis'));
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
            'marca' => 'required',
            'modelo' => 'required',
            'matricula' => 'required',
            'data_matricula' => 'required',
            'tipo_veiculo' => 'required',
            'combustivel' => 'required',
        ]);

        $this->currentStep = 3;
    }


    public function submitForm()
    {
        $finish_time = Carbon::parse($this->start_time);
        $finish_time->addMinutes(15)->format('H:i');
        $idUsuarioAutenticado = Auth::id();

        $veiculo = Veiculo::create([
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'matricula' => $this->matricula,
            'data_matricula' => $this->data_matricula,
            'tipo_veiculo' => $this->tipo_veiculo,
            'combustivel' => $this->combustivel,
            'user_id' => $idUsuarioAutenticado,
        ]);


        Appointment::create([
            'service_id' => $this->service_id,
            'employee_id' => $this->employee_id,
            'user_id' => $idUsuarioAutenticado,
            'veiculo_id' => $veiculo->id,
            'data' => $this->data,
            'start_time' => $this->start_time,
            'finish_time' => $finish_time,
            'comments' => $this->comments,
        ]);

        $this->successMessage = 'Agendamento Efectuado com Successo.';
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

        //campos do veiculo
        $this->marca = '';
        $this->modelo = '';
        $this->matricula = '';
        $this->data_matricula = '';
        $this->tipo_veiculo = '';
        $this->combustivel = '';
    }
}

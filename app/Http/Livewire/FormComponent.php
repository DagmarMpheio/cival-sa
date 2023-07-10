<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormComponent extends Component
{
    public $inputs = [];
    protected $rules = [];

    public function addInput()
    {
        $this->inputs[] = [
            'marca' => '',
            'modelo' => '',
            'matricula' => '',
            'data_matricula' => '',
            'tipo_veiculo' => '',
            'combustivel' => '',
        ];

        // Adiciona as regras de validação para o novo input
        $this->rules['inputs.' . (count($this->inputs) - 1) . '.marca'] = 'required';
        $this->rules['inputs.' . (count($this->inputs) - 1) . '.modelo'] = 'required';
        $this->rules['inputs.' . (count($this->inputs) - 1) . '.matricula'] = 'required';
        $this->rules['inputs.' . (count($this->inputs) - 1) . '.data_matricula'] = 'required';
        $this->rules['inputs.' . (count($this->inputs) - 1) . '.tipo_veiculo'] = 'required';
        $this->rules['inputs.' . (count($this->inputs) - 1) . '.combustivel'] = 'required';
    }

    public function updated($field)
    {
        // Valida o campo atualizado
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('livewire.form-component');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = [
        'servico',
        'preco',
        'descricao',
    ];

    //Metodos essenciais apara agendamento
    public function employeeServices()
    {
        return $this->hasMany(EmployeeService::class, 'service_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'service_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca',
        'modelo',
        'matricula',
        'data_matricula',
        'tipo_veiculo',
        'combustivel',
        'user_id',
        'appointment_id',
    ];


    public function dono()
    {
        return $this->belongsTo(User::class); //um veiculo pertence a um dono
    }


    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}

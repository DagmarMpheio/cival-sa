<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id', 'employee_id', 'user_id','veiculo_id', 'data', 'start_time', 'finish_time', 'comments'
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'veiculo_id');
    }

    public function service()
    {
        return $this->belongsTo(Servico::class, 'service_id');
    }

    public function getDateAttribute($value)
    {
        //return $this->created_at->diffForHumans();//formatacao das datas//
        return is_null($this->created_at) ? '' : $this->created_at->diffForHumans(); //formatacao das datas
    }


    //formatar a o campo created_At
    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/Y";
        if ($showTimes)
            $format = $format . " H:s:i";
        return $this->created_at->format($format);
    }
}

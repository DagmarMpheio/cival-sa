<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeService extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'service_id'
    ];

    public function service()
    {
        return $this->belongsTo(Servico::class, 'service_id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}

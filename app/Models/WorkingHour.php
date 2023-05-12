<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'date', 'start_time', 'finish_time'
    ];

    public function employees()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}

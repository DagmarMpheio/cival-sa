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

    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/Y";
        if ($showTimes)
            $format = $format . " H:s:i";
        return $this->created_at->format($format);
    }
}

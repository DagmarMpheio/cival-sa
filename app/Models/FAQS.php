<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQS extends Model
{
    use HasFactory;

    protected $fillable = [
        'questao',
        'resposta',
    ];

    protected $table='faqs';
}

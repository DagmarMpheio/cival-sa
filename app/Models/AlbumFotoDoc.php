<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumFotoDoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_album'
    ];


    public function multimedia()
    {
        return $this->hasMany(Multimedia::class); //multimedia tem muitos albums
    }
}

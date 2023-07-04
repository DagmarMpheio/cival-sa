<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    use HasFactory;
    protected $fillable = ['ficheiro', 'tipo','doc_type','album_id','nome_ficheiro','descricao'];

    //formatar a o campo created_At
    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/Y";
        if ($showTimes)
            $format = $format . " H:s:i";
        return $this->created_at->format($format);
    }

    public function album()
    {
        return $this->belongsTo(AlbumFotoDoc::class); //um item de multimedia pertence a album
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];
    protected $table = "categorias";

    public function posts()
    {
        return $this->hasMany(Post::class,'category_id'); //uma categoria tem muitos posts
    }

    public function getRouteKeyName()
    {
        return 'slug'; //pegar a slug na url e mostrar os dados
    }
}

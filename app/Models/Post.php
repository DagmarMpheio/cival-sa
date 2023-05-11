<?php

namespace App\Models;

use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'published_at', 'category_id', 'image'];

    protected $dates = ['published_at'];

    public function author()
    {
        return $this->belongsTo(User::class); //um post pertence a um usuario
    }

    public function category()
    {
        return $this->belongsTo(Categoria::class); //um post pertence a uma categoria
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class); //varias tags pertencem a varios posts
    }

    public function comments()
    {
        return $this->hasMany(Comment::class); //um post tem varios comentarios
    }

    public function commentsNumber($label = 'Comentário')
    {
        $commentsNumber = $this->comments()->count();

        return $commentsNumber . " " . \Str::plural($label, $commentsNumber);
    }

    //criar comentarios
    public function createComment(array $data)
    {
        $this->comments()->create($data);
    }


    //criar tags
    public function createTags($tagString)
    {
        $tags = explode(",", $tagString);
        $tagIds = [];
        foreach ($tags as $tag) {
            /*$newTag = new Tag();
            $newTag->name = ucwords(trim($tag));
            $newTag->slug = \Str::slug($tag);*/
            $newTag = Tag::firstOrCreate(
                ['slug' => \Str::slug($tag)],
                ['name' => ucwords(trim($tag))]
            );/*firstOrCreate() vai criar dados e verificar se ja existem*/
            /*$newTag->save();*/
            $tagIds[] = $newTag->id;
        }

        /* $this->tags()->detach();
         $this->tags()->attach($tagIds);*/
        $this->tags()->sync($tagIds);
    }

    public function getTagsListAttribute()
    {
        return $this->tags->pluck('name');
    }

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ?: NULL;
    }


    //retornar as imagens
    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";

        if (!is_null($this->image)) {
            $directory = config('cms.image.directory');
            $imagePath = public_path() . "/{$directory}/" . $this->image;
            if (file_exists($imagePath))
                $imageUrl = asset("{$directory}/" . $this->image);
        }
        return $imageUrl;
    }

    //retornar thumbnail das imagens
    public function getImageThumbUrlAttribute($value)
    {
        $imageUrl = "";

        if (!is_null($this->image)) {
            $directory = config('cms.image.directory');
            $ext = substr(strchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . "/{$directory}/" . $this->thumbnail;
            if (file_exists($imagePath))
                $imageUrl = asset("{$directory}/" . $thumbnail);
        }
        return $imageUrl;
    }

    public function getDateAttribute($value)
    {
        /*return $this->created_at->diffForHumans();//formatacao das datas*/
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans(); //formatacao das datas
    }

    //escope data de publicacao
    public function scopePublished($query)
    {
        return $query->where("published_at", "<=", Carbon::now());
    }

    //escopo dos posts agendados
    public function scopeScheduled($query)
    {
        return $query->where("published_at", ">", Carbon::now());
    }

    //escopo dos posts agendados
    public function scopeDraft($query)
    {
        return $query->whereNull("published_at");
    }

    //escopo dos populares posts
    public function scopePopular($query)
    {
        return $query->orderBy('view_count', 'desc');
    }

    //FORMATAR o corpo do post com markdowns
    public function getBodyHtmlAttribute($value)
    {
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }

    //FORMATAR o excerpt do post com markdowns
    public function getExcerptHtmlAttribute($value)
    {
        return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL;
    }

    public function getTagsHtmlAttribute()
    {
        $anchors = [];
        foreach ($this->tags as $tag) {
            $anchors[] = '<a href = "' . route('tag', $tag->slug) . '">' . $tag->name . '</a >';
        }

        return implode(", ", $anchors);
    }

    //formatar a o campo created_At
    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/Y";
        if ($showTimes)
            $format = $format . " H:s:i";
        return $this->created_at->format($format);
    }

    /* definir se foi publicado ou nao*/
    public function publicationLabel()
    {
        if (!$this->published_at) {
            return '<span class="label label-warning">Rascunho</span>';
        } elseif ($this->published_at && $this->published_at > Carbon::now()) {
            return '<span class="label label-info">Agendado</span>';
        } else {
            return '<span class="label label-success">Publicado</span>';
        }
    }

    public static function archives()
    {
        DB::statement("SET lc_time_names = 'pt_PT'"); //mostrar os meses em portugues

        return static::selectRaw('count(id) as post_count, year(published_at) year, monthname(published_at) month')
        ->published()
            ->groupBy('year', 'month')
            ->orderByRaw('min(published_at) desc')
            ->get();
    }

    //metodo para pesquisa de posts
    public function scopeFilter($query, $filter)
    {

        //mostrar se foi definido o ano ou data como pesquisa
        if (isset($filter['month']) && $month = $filter['month']) {
            $query->whereRaw('month(published_at) = ?', [Carbon::parseFromLocale($month, 'pt')->month]); //pegar o mes em inteiro, ex: maio=>5
        }

        if (isset($filter['year']) && $year = $filter['year']) {
            $query->whereRaw('year(published_at) = ?', [$year]);
        }

        //verificar se alguma pesquisa foi feita
        if (isset($filter['term']) && $term = $filter['term']) {
            $query->where(function ($q) use ($term) {
                //pesquisar com o nome do autor
                $q->whereHas('author', function ($qr) use ($term) {
                    $qr->where('name', 'LIKE', "%{$term}%");
                });
                $q->orWhereHas('category', function ($qr) use ($term) {
                    $qr->where('title', 'LIKE', "%{$term}%");
                });
                $q->orWhere('title', 'LIKE', "%{$term}%");
                $q->orWhere('excerpt', 'LIKE', "%{$term}%");
                $q->orWhere('body', 'LIKE', "%{$term}%");
            });
        }
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'telefone',
        'endereco',
        'genero',
        'bio',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id'); //um usuario tem um ou muitos posts
    }

    public function getRouteKeyName()
    {
        return 'slug'; //pegar a slug na url e mostrar os dados
    }

    public function getBioHtmlAttribute($value)
    {
        return $this->bio ? Markdown::convertToHtml(e($this->bio)) : NULL;
    }

    //avatar do autor do post
    public function gravatar()
    {
        $email = $this->email;
        $default = asset("img/author-default.png");
        $size = 100;

        return $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . urlencode($default) . "&s=" . $size;
    }


    //Metodos essenciais para agendamento
    public function workingHour()
    {
        return $this->hasMany(WorkingHour::class, 'employee_id');
    }

    public function employeeServices()
    {
        return $this->hasMany(EmployeeService::class, 'employee_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'employee_id');
    }
    
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'endereco' => ['required'],
            'telefone' => ['required'],
            'data_nascimento' => ['required'],
            'genero' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tipo_cliente' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $faker = Factory::create(); //dados falsos(aleatorios)

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'endereco' => $data['endereco'],
            'telefone' => $data['telefone'],
            'data_nascimento' => $data['data_nascimento'],
            'genero' => $data['genero'],
            'slug' => Str::slug($data['name'].'-'.$faker->numberBetween(0,999999999)),
            'tipo_cliente' => $data['tipo_cliente'],
            'password' => Hash::make($data['password']),
        ]);

        $user->addRole(3); //add a permissao de utente

        return $user;
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersCount = User::count();
        $agendasCount = Appointment::count();
        $inpencoesCount = Appointment::whereHas('service', function ($query) {
            $query->where('servico', '=', 'Inspecção');
        })->count();
        
        return view('backend.home.index', compact('usersCount', 'agendasCount', 'inpencoesCount'));
        //return dd($inpencoesCount);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        $user = $request->user();
        $agendamentos = Appointment::with(['employee', 'service','user'])->get();

        return view('backend.home.profile', compact('user','agendamentos'));
    }

    /**
     * mostrar dados relativos ao perfil
     */
    public function edit(Request $request)
    {

        $user = $request->user();

        return view('backend.home.edit-profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request)
    {
        /* $user = $request->user();
        $user->update($request->all());
 */
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return redirect()->back()->with("message", "Conta actualizada com sucesso!");
    }

    /*metodo para abrir o formulario da senha*/
    public function changePassword(Request $request)
    {
        $user = $request->user();

        return view('backend.home.change-password', compact('user'));
    }

    //update password
    public function updatePassword(ChangePasswordRequest $request)
    {
        $user = $request->user();

        $data = $request->all();

        //se a palavra passe antiga contiga com que esta na bd, faca:
        if (password_verify($data['password-antiga'], $user->password)) {

            $data['password'] = bcrypt($data['password']);

            /*dd("password-actual: " . $data['password']);*/
            $user->update($data);

            return redirect()->back()->with("message", "Password alterada com sucesso!");
        } else {
            return redirect()->back()->with("error-message", "A password antiga está incorrecta!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

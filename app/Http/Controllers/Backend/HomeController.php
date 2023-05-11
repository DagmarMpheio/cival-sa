<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\UserUpdateRequest;
use Illuminate\Http\Request;

class HomeController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.home.index');
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

        return view('backend.home.profile', compact('user'));
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
        $user = $request->user();
        $user->update($request->all());

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
    public function destroy(string $id)
    {
        //
    }
}

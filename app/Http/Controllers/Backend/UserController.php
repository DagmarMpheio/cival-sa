<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\User\UserDestroyResquest;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use App\Models\Servico;
use App\Models\EmployeeService;

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name')->simplePaginate(5);
        $usersCount = User::count();

        return view('backend.users.index', compact('users', 'usersCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = new User();
        $servicos = Servico::all();

        return view('backend.users.create', compact('user','servicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        //
        $data = $request->all();
        //$data['password'] = bcrypt($data['password']);

        //$user = User::create($data);
        #$user->removeRole($user->role); //retirar a permissao actual
        //$user->addRole($request->role); //add a permissao

        //se o admin selecionou os servicos que funcionario eh responsavel 
        //e se o tipo de usuario eh funcionario, cadastre os dados
        /* $selectedServices=$data['services'];
        if ($selectedServices && $data['role']==2){
            foreach ($selectedServices as $servico_id) {
                $employeeService = EmployeeService::create([
                    'employee_id'=>$user->id,
                    'service_id'=>$servico_id,
                ]);
            }
        }
 */
        return dd($data);
        //return redirect('/backend/users')->with("message", "Novo usuário inserido com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::findOrFail($id);

        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        //
        $user = User::findOrFail($id);
        $user->update($request->all());

        $user->removeRole($user->role); //retirar a permissao actual
        $user->addRole($request->role); //add a permissao

        return redirect('/backend/users')->with("message", "Usuário actualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDestroyResquest $resquest, $id)
    {
        //
        $user = User::findOrFail($id);

        $deleteOption = $resquest->delete_option;
        $selectedUser = $resquest->selected_user;

        if ($deleteOption == "delete") {
            //apagar os posts do usuario
            $user->posts()->withTrashed()->forceDelete();
            //apagar a imagem do servidor
            $user->post;
        } elseif ($deleteOption == "atribute") {
            $user->posts()->update(['author_id' => $selectedUser]);
        }
        //apagar o usuario
        $user->delete();


        return redirect("/backend/users")->with("message", "Usuário foi excluído com succeso!");
    }

    public function confirm(UserDestroyResquest $resquest, $id)
    {
        //

        $user = User::findOrFail($id);
        $users = User::where('id', '!=', $user->id)->pluck('name', 'id');

        return view("backend.users.confirm", compact('user', 'users'));
    }
}

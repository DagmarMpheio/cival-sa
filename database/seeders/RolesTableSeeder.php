<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //apagar tudo da tabela roles
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('roles')->truncate(); //apagar todos os dados da tabela

        //Create Admin role
        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "Admin";
        $admin->save();

        //Create Funcionário role
        $funcionario = new Role();
        $funcionario->name = "funcionario";
        $funcionario->display_name = "Funcionário";
        $funcionario->save();

        //Create Utente role
        $utente = new Role();
        $utente->name = "utente";
        $utente->display_name = "Utente";
        $utente->save();

        /*atribuir os cargos*/
        //primeiro usuario com administrador
        $user1 = User::find(1);
        $user1->removeRole($admin); //retirar cargo existente
        $user1->addRole($admin); //add cargo


        //segundo usuario com funcionario
        $user2 = User::find(2);
        $user2->removeRole($funcionario); //retirar cargo existente
        $user2->addRole($funcionario); //add cargo


        //terceiro usuario com autor
        $user3 = User::find(3);
        $user3->removeRole($utente); //retirar cargo existente
        $user3->addRole($utente);//add cargo
    }
}

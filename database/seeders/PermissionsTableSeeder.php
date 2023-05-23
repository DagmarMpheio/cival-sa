<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //apagar tudo da tabela permission
        //DB::table('permissions')->truncate(); //apagar todos os dados da tabela

        //crud post
        $crudPost = new Permission();
        $crudPost->name = "crud-post";
        $crudPost->save();

        //update others post
        $updateOthersPost = new Permission();
        $updateOthersPost->name = "update-others-post";
        $updateOthersPost->save();

        //delete others post
        $deleteOthersPost = new Permission();
        $deleteOthersPost->name = "delete-others-post";
        $deleteOthersPost->save();

        //crud category
        $crudCategory = new Permission();
        $crudCategory->name = "crud-category";
        $crudCategory->save();

        //crud faq
        $crudFaq = new Permission();
        $crudFaq->name = "crud-faq";
        $crudFaq->save();

        //crud servico
        $crudServico = new Permission();
        $crudServico->name = "crud-servico";
        $crudServico->save();

        //crud file
        $crudFile = new Permission();
        $crudFile->name = "crud-file";
        $crudFile->save();

        //crud horario de expediente
        $crudHorarioExpediente = new Permission();
        $crudHorarioExpediente->name = "crud-expediente";
        $crudHorarioExpediente->save();

        //crud agenda
        $crudAgenda = new Permission();
        $crudAgenda->name = "crud-agenda";
        $crudAgenda->save();

        //crud user
        $crudUser = new Permission();
        $crudUser->name = "crud-user";
        $crudUser->save();

        //definir as permission referentes aos cargos
        $admin = Role::whereName('admin')->first();
        $funcionario = Role::whereName('funcionario')->first();
        $utente = Role::whereName('utente')->first();

        $admin->removePermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudUser, $crudFaq, $crudFile, $crudServico, $crudAgenda, $crudHorarioExpediente]);
        $admin->givePermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudUser, $crudFaq, $crudFile, $crudServico, $crudAgenda, $crudHorarioExpediente]);

        $funcionario->removePermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudFaq]);
        $funcionario->givePermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudFaq]);

        $utente->removePermission($crudAgenda);
        $utente->givePermission($crudAgenda);
    }
}

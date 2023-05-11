<?php
/**
 * Created by PhpStorm.
 * User: Dagmar Mpheio
 * Date: 11/2/2020
 * Time: 1:13 PM
 */

function check_user_permissions($request, $actionName = NULL, $id = NULL)
{
//pegar o usuario actual
    $currentUser = $request->user();

    //pegar a accao actual
    if ($actionName) {
        $currentActionName = $actionName;
    } else {
        $currentActionName = ($request->route()->getActionName());
    }

    list($controller, $method) = explode('@', $currentActionName);
    $controller = str_replace(["App\\Http\Controllers\\Backend\\", "Controller"], "", $controller);
//        dd("C: $controller M: $method");

    //mapa classe
    $classesMap = [
        'Blog' => 'post',
        'Categorias' => 'category',
        'Users' => 'user'
    ];

    //mapa das permissoes
    $crudPermissionsMap = [
        'crud' => ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy', 'index', 'view']
    ];

    foreach ($crudPermissionsMap as $permission => $methods) {
        //se o metodo actual existe na lista de metodos,
        //vamos verificar a permissao
        if (in_array($method, $methods) && isset($classesMap[$controller])) {

            $classeName = $classesMap[$controller];

            if ($classeName == 'post' && in_array($method, ['edit', 'update', 'destroy', 'restore', 'forceDestroy'])) {

                $id = !is_null($id) ? $id : $request->route('blog');
                //se o usuario actual nao tem update-others-post/delete-others-post permissso
                //garantir que o usuario modifique o seu proprio post
                if ($id && (!$currentUser->hasPermission('update-others-post') || !$currentUser->hasPermission('delete-others-post'))) {

                    $post = \App\Models\Post::withTrashed()->find($id);
                    if ($post->author_id !== $currentUser->id) {
                        /* abort(403, "Acesso Proíbido!");*/
                        return false;
                    }
                }

            } //se o usuario actual nao tem permissao, nao permitir o proximo pedido
            elseif (!$currentUser->hasPermission("{$permission}-{$classeName}")) {
                /*abort(403, "Acesso Proíbido!");*/
                return false;
            }
            break;
        }

    }
    return true;
}
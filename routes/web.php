<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* rotas admin*/
Route::get('/dashboard', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('dashboard');
Route::get('/perfil', [App\Http\Controllers\Backend\HomeController::class, 'show'])->name('perfil');
Route::get('/edit-account', [App\Http\Controllers\Backend\HomeController::class, 'edit'])->name('editar-perfil');
Route::put('/update-account', [App\Http\Controllers\Backend\HomeController::class, 'update']);
Route::get('/change-password', [App\Http\Controllers\Backend\HomeController::class, 'changePassword']);
Route::put('/update-password', [App\Http\Controllers\Backend\HomeController::class, 'updatePassword']);

//grupo de rotas -> users
Route::group(['prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::resource('users', App\Http\Controllers\Backend\UserController::class);
});

//grupo de rotas -> faqs
Route::group(['prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::resource('faqs', App\Http\Controllers\Backend\FAQSController::class);
});

//grupo de rotas -> servicos
Route::group(['prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::resource('servicos', App\Http\Controllers\Backend\ServicoController::class);
});

//grupo de rotas -> categoria
Route::group(['prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::resource('categorias', App\Http\Controllers\Backend\CategoriaController::class);
});

//grupo de rotas -> blog
Route::group(['prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::resource('blog', App\Http\Controllers\Backend\BlogController::class);
});
Route::put('/backend/blog/restore/{blog}', [App\Http\Controllers\Backend\BlogController::class, 'restore'])->name('backend.blog.restore');

Route::delete('/backend/blog/force-destroy/{blog}', [App\Http\Controllers\Backend\BlogController::class, 'forceDestroy'])->name('backend.blog.force-destroy');

//grupo de rotas -> blog
Route::group(['prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::resource('multimedias', App\Http\Controllers\Backend\MultimediaController::class);
});

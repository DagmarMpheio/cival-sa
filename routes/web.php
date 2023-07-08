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

/* Route::get('/', function () {
    return view('welcome');
}); */

// Pagina Blog - Vista de usuario
/*Route::get('/', [App\Http\Controllers\BlogController::class,'index'])->name('blog');
Route::get('/blog/show', function () {
    return view('blog.show');
});*/

//site guest
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'] )->name('index');
Route::get('/pesquisar', [App\Http\Controllers\WelcomeController::class, 'pesquisar'] )->name('pesquisar');
Route::get('/faqs', [App\Http\Controllers\WelcomeController::class, 'showFaqs'])->name('faqs');
Route::post('/mensagem',[App\Http\Controllers\WelcomeController::class, 'mensagem'])->name('post-mensagem');
Route::get('/documentos', [App\Http\Controllers\WelcomeController::class, 'showDocs'])->name('documentos');
Route::get('/blog/{post}', [App\Http\Controllers\BlogController::class,'show'])->name('blog.show');
Route::get('/blog', [App\Http\Controllers\BlogController::class,'index'])->name('blog');
Route::get('/category/{category}', [App\Http\Controllers\BlogController::class,'category'])->name('category');

/*Route::post('/post/{post}/comments', [
    'uses' => [App\Http\Controllers\CommentsController::class,'store'],
    'as' => 'blog.comments'
]);*/

Route::post('/post/{post}/comments', [App\Http\Controllers\CommentsController::class,'store'])->name('blog.comments');

Route::get('/author/{author}', [App\Http\Controllers\BlogController::class,'author'])->name('author');
Route::get('/tag/{tag}', [App\Http\Controllers\BlogController::class,'tag'])->name('tag');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* rotas admin*/
Route::get('/dashboard', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('dashboard');
Route::get('/perfil', [App\Http\Controllers\Backend\HomeController::class, 'show'])->name('perfil');
Route::get('/edit-account', [App\Http\Controllers\Backend\HomeController::class, 'edit'])->name('editar-perfil');
Route::put('/update-account', [App\Http\Controllers\Backend\HomeController::class, 'update']);
Route::get('/change-password', [App\Http\Controllers\Backend\HomeController::class, 'changePassword']);
Route::put('/update-password', [App\Http\Controllers\Backend\HomeController::class, 'updatePassword']);
Route::get('/financas', [App\Http\Controllers\Backend\HomeController::class, 'financas'])->name('backend.home.financas');

//grupo de rotas -> users
Route::group(['prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::resource('users', App\Http\Controllers\Backend\UserController::class);
    //rota para o metodo confirm
    Route::get('users/confirm/{users}', [App\Http\Controllers\Backend\UserController::class, 'confirm'])->name('users.confirm');
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

Route::post('/backend/blog/{post}/comments', [App\Http\Controllers\Backend\CommentController::class, 'store'])->name('backend.blog.comment');

//grupo de rotas -> multimedia
Route::group(['prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::resource('multimedias', App\Http\Controllers\Backend\MultimediaController::class);
});

//grupo de rotas -> horario-expediente
Route::group(['prefix' => 'backend', 'as' => 'backend.'],function () {
    Route::resource('horario-expediente', App\Http\Controllers\Backend\WorkingHourController::class);
});


//grupo de rotas -> mensagens
Route::group(['prefix' => 'backend', 'as' => 'backend.'],function () {
    Route::resource('mensagens', App\Http\Controllers\Backend\MensagemController::class);
});

Route::group(['prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::resource('agendas', App\Http\Controllers\Backend\AppointmentController::class);
    Route::get('agendas-calendario', [App\Http\Controllers\Backend\AppointmentController::class, 'showCalendar'])->name('agendas.showCalendar');
});

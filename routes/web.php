<?php

use App\Mail\EmailsTarefas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('home', function () {
    return redirect('/');
});

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/', function () {
    return view('pagina', ['slug_page'=>'dashboard', 'page_slug'=>'dashboard']);
})->name('home.dashboard');


Route::get('dashboard', function () {
    return view('pagina', ['slug_page'=>'dashboard', 'page_slug'=>'dashboard']);
})->name('dashboard');



// Frefixo de rotas para a Administradoras
Route::prefix('/tarefas')->group( function() 
{
    Route::get('/', function () {
        return redirect('/tarefas/listagem');
     });

    Route::get('listagem/{view_mode?}', [App\Http\Controllers\TarefaController::class, 'store'])->name('tarefas.listagem');

    Route::get('busca/{keyword?}', [App\Http\Controllers\TarefaController::class, 'search'])->name('tarefas.busca');
    //Route::post('busca/{keyword?}', [App\Http\Controllers\TarefaController::class, 'search'])->name('tarefas.busca');

    //Route::get('listagem', [App\Http\Controllers\TarefaController::class, 'show'])->name('tarefas.details'); // tarefas.details
    
    // Adicionar
    Route::get('adicionar', [App\Http\Controllers\TarefaController::class, 'form_create'])->name('tarefas.adicionar');
    Route::post('adicionar/create', [App\Http\Controllers\TarefaController::class, 'create'])->name('tarefas.adicionar.create');
    Route::get('adicionar/create', [App\Http\Controllers\TarefaController::class, 'show'])->name('tarefas.adicionar.create');
    // Editar
    Route::get('editar/{id?}', [App\Http\Controllers\TarefaController::class, 'form_edit'])->name('tarefas.editar');
    Route::post('editar/update/{id?}', [App\Http\Controllers\TarefaController::class, 'update'])->name('tarefas.editar.update');
    Route::get('editar/update/{id?}', [App\Http\Controllers\TarefaController::class, 'show'])->name('tarefas.editar.update');

    // Deletar
    Route::get('deletar/{id?}', [App\Http\Controllers\TarefaController::class, 'show'])->name('tarefas.deletar');
    //Route::post('deletar/drop/{id?}', [App\Http\Controllers\TarefaController::class, 'destroy'])->name('tarefas.deletar.drop');
    Route::get('deletar/drop/{id?}', [App\Http\Controllers\TarefaController::class, 'destroy'])->name('tarefas.deletar.drop');
    //

    Route::get('open/{id?}', [App\Http\Controllers\TarefaController::class, 'show'])->name('tarefas.open');

    Route::post('task_dragdrop_reorder', [App\Http\Controllers\TarefaController::class, 'task_dragdrop_reorder'])->name('tarefas.task_dragdrop_reorder');

});

Route::get('tarefas-emails', function(){
    //return new EmailsTarefas();
    Mail::to('dg@diogosoares.com.br')->send(new EmailsTarefas());
    return 'Email enviado com sucesso!';
});

 //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

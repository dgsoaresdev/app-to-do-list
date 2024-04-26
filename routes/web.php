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

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::get('/', function () {
    return redirect('login');
});

// Redirect 404 to login or Task List (if logged user)
Route::fallback(function () {
    return redirect('login'); 
});


// Start Auth Routes
Auth::routes();

//Start - Redirect home to Tasks list
Route::get('/', function () {
    return redirect('/tarefas/listagem');
})->name('home.dashboard');
//...
Route::get('dashboard', function () {
    return redirect('/tarefas/listagem');
})->name('dashboard');
// End - Redirect home to Tasks list


// Frefixo de rotas para a Administradoras
Route::prefix('/tarefas')->group( function() 
{
    // Redirect
    Route::get('/', function () {
        return redirect('/tarefas/listagem');
     });

    // Start - CRUD
    //Read
    Route::get('listagem/{view_mode?}', [App\Http\Controllers\TarefaController::class, 'store'])->name('tarefas.listagem');
    Route::get('busca/{keyword?}', [App\Http\Controllers\TarefaController::class, 'search'])->name('tarefas.busca');
    //Create
    Route::get('adicionar', [App\Http\Controllers\TarefaController::class, 'form_create'])->name('tarefas.adicionar');
    Route::post('adicionar/create', [App\Http\Controllers\TarefaController::class, 'create'])->name('tarefas.adicionar.create');
    Route::get('adicionar/create', [App\Http\Controllers\TarefaController::class, 'show'])->name('tarefas.adicionar.create');
    //Edit
    Route::get('editar/{id?}', [App\Http\Controllers\TarefaController::class, 'form_edit'])->name('tarefas.editar');
    Route::post('editar/update/{id?}', [App\Http\Controllers\TarefaController::class, 'update'])->name('tarefas.editar.update');
    Route::get('editar/update/{id?}', [App\Http\Controllers\TarefaController::class, 'show'])->name('tarefas.editar.update');
    //Delet
    Route::get('deletar/{id?}', [App\Http\Controllers\TarefaController::class, 'show'])->name('tarefas.deletar');
    Route::get('deletar/drop/{id?}', [App\Http\Controllers\TarefaController::class, 'destroy'])->name('tarefas.deletar.drop');
    // End - CRUD

    //Modal Open Task
    Route::get('open/{id?}', [App\Http\Controllers\TarefaController::class, 'show'])->name('tarefas.open');
    //Drag & Drop change status
    Route::post('task_dragdrop_reorder', [App\Http\Controllers\TarefaController::class, 'task_dragdrop_reorder'])->name('tarefas.task_dragdrop_reorder');

});

// Route::get('tarefas-emails', function(){
//     //return new EmailsTarefas();
//     Mail::to('dg@diogosoares.com.br')->send(new EmailsTarefas());
//     return 'Email enviado com sucesso!';
// });

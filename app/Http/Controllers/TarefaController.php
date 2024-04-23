<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Http\Requests\StoreTarefaRequest;
use App\Http\Requests\UpdateTarefaRequest;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTarefaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Tarefa $tarefas, $view_mode = "")
    {
        //
        // $tarefa_store = $request->store();

        $tarefa_store     = $tarefas->store();
        $statuses_tasks   = $this->statuses_tasks();
        $priorities_tasks = $this->priorities_tasks();

        return view('pagina', ['slug_page'=>'tarefas', 'page_slug'=>'tarefas', 'tarefas'=>$tarefa_store, 'statuses_tasks'=>$statuses_tasks, 'priorities_tasks' => $priorities_tasks, 'view_mode' => $view_mode]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTarefaRequest  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTarefaRequest $request, Tarefa $tarefa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }

    public function statuses_tasks()
    {
        $tasks_status = array(
            0 => 'Não Iniciada',
            1 => 'Em andamento',
            2 => 'Concluída',
            3 => 'Pausada',
            4 => 'Atrasada',
            5 => 'Suspensa',
        );
        return $tasks_status;
    }

    public function priorities_tasks()
    {
        $tasks_status = array(
            0 => 'Alta',
            1 => 'Média',
            2 => 'Baixa'
        );
        return $tasks_status;
    }
}

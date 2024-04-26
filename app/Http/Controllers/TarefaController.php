<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Mail\WelcomeEmail;
use App\Mail\EmailsTarefas;
use Illuminate\Http\Request;
use App\Mail\EmailNovaTarefa;
use App\Mail\EmailDeletaTarefa;
use App\Mail\EmailAtualizaTarefa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailAtualizaStatusTarefa;
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

    public function users($user_id = "")
    {
        $tarefa = new Tarefa; 
        $users = $tarefa->users($user_id);
        $users_arr = array();
        foreach( $users as $user) {
            $users_arr[$user->id] = $user;
        }
        return  $users_arr;
    }

    public function form_create()
    {

        $tarefa = new Tarefa;
        $tarefa->name            = '';
        $tarefa->description     = '';
        $tarefa->owner_id        = '';
        $tarefa->status          = '';
        $tarefa->priority        = '';
        $tarefa->start_datetime  = '';
        $tarefa->deadline        = '';

        $users = $this->users();
        $statuses_tasks = $this->statuses_tasks();
        $priorities_tasks = $this->priorities_tasks();
        //$action_route = 'tarefas.adicionar.create';

        $action_route = route('tarefas.adicionar.create');

        return  view('layouts._partials.tarefas.tarefas-form', ['contact_details'=>array(), 'action_route'=>$action_route, 'tarefa'=>$tarefa, 'users' => $users, 'statuses_tasks'=>$statuses_tasks, 'priorities_tasks'=>$priorities_tasks]);
    }

    //{{ route('tarefas.editar.update', $tarefa->id) }}

    public function form_edit($id_task="")
    {
        $tarefa = new Tarefa; 
        $tarefa = $tarefa->store('tasks_by_id', $id_task)[0];

        $users = $this->users();
        $statuses_tasks = $this->statuses_tasks();
        $priorities_tasks = $this->priorities_tasks();
        //$action_route = 'tarefas.editar.update';

        $action_route = route('tarefas.editar.update', $id_task);

        return  view('layouts._partials.tarefas.tarefas-form', ['contact_details'=>array(), 'action_route'=>$action_route, 'tarefa'=>$tarefa, 'users' => $users, 'statuses_tasks'=>$statuses_tasks, 'priorities_tasks'=>$priorities_tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request )
    {
        

        if ( isset($request)) {
            
            $tarefa = new Tarefa();

            $tarefa->name                   = $request->input('name');
            $tarefa->description            = $request->input('description');
            $tarefa->project_id             = 1;
            $tarefa->user_id                = Auth::id();
            $tarefa->owner_id               = $request->input('owner_id');
            $tarefa->status                 = $request->input('status');
            $tarefa->priority               = $request->input('priority');
            $tarefa->start_datetime         = $request->input('start_datetime');
            $tarefa->deadline               = $request->input('deadline');


            $tarefa->save();
            $tarefa_id = $tarefa->id;


            if ( $tarefa_id > 0 ) {
               
                $type = 'success';
                $msg = 'Tarefa adicionada com sucesso.';
                $url_redirect = route('tarefas.listagem');
            } else {
                $type = 'error';
                $msg = 'Algum erro ocorreu ao tentar adicionar a tarefa.';
                $url_redirect = route('tarefas.listagem');
            }
        } else {
            $type = 'error';
            $msg = 'Algum erro ocorreu ao tentar adicionar a tarefa.';
            $url_redirect = route('tarefas.listagem');
        }

        //=======================
        // Start - Send Email Notification
        //=======================
        $model_tarefa = new Tarefa;
        $owner_tarefa_details = $model_tarefa->users( $tarefa->owner_id )[0];
        $destinatario = $owner_tarefa_details->email;
        Mail::to($destinatario)->send( new EmailNovaTarefa($tarefa, $this->priorities_tasks(), $this->statuses_tasks()));
        //=======================
        // End - Send Email Notification
        //=======================
       
        $this->notificationApp($type,$msg);
        return redirect( $url_redirect );
        
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
        $owners_tasks     = $this->users();
        // Build Arrays
        // Status
        $statuses_tasks_values_in_line = array();
        $tarefa_store_by_status = array();
        foreach($statuses_tasks as $statuses_key =>$statuses_value ){
            $statuses_tasks_values_in_line[] = 'status_'.$statuses_key;

            $tarefa_store_by_status[$statuses_key] = $tarefas->store('tasks_by_status','',$statuses_key);

        }
        $statuses_tasks_values_in_line   = json_encode( $statuses_tasks_values_in_line );

        // Prioroties
        $arr_priorities = array();
        
        foreach( $priorities_tasks as $priorities_key => $priorities_value ){

            $arr_priorities[$priorities_key]['name'] = $priorities_value;

            switch($priorities_key){
                
                case 1 :
                    $arr_priorities[$priorities_key]['label'] = 'bg-danger';
                break;
                case 2 :
                    $arr_priorities[$priorities_key]['label'] = 'bg-warning text-black';
                break;
                case 3 :
                    $arr_priorities[$priorities_key]['label'] = 'bg-primary';
                break;
            }

        }

        if ( !Auth::check() ){

            return redirect( route('home') );
        
        }

        return view('pagina', ['slug_page'=>'tarefas', 'page_slug'=>'tarefas', 'owners_tasks'=>$owners_tasks, 'statuses_tasks'=>$statuses_tasks, 'arr_priorities' => $arr_priorities, 'priorities_tasks' => $priorities_tasks, 'view_mode' => $view_mode, 'statuses_tasks_values_in_line' => $statuses_tasks_values_in_line, 'tarefa_store_by_status' => $tarefa_store_by_status]);
    }


    public function search(Tarefa $tarefas, $keyword = "")
    {
        //
        // $tarefa_store = $request->store();

        $tarefa_store     = $tarefas->store();
        $statuses_tasks   = $this->statuses_tasks();
        $priorities_tasks = $this->priorities_tasks();
        $owners_tasks     = $this->users();
        // Build Arrays
        // Status
        $statuses_tasks_values_in_line = array();
        $tarefa_store_by_status = array();
        foreach($statuses_tasks as $statuses_key =>$statuses_value ){
            $statuses_tasks_values_in_line[] = 'status_'.$statuses_key;

            $tarefa_store_by_status[$statuses_key] = $tarefas->store('tasks_by_status_and_search','',$statuses_key, $keyword);

        }
        $statuses_tasks_values_in_line   = json_encode( $statuses_tasks_values_in_line );

        // Prioroties
        $arr_priorities = array();
        
        foreach( $priorities_tasks as $priorities_key => $priorities_value ){

            $arr_priorities[$priorities_key]['name'] = $priorities_value;

            switch($priorities_key){
                
                case 1 :
                    $arr_priorities[$priorities_key]['label'] = 'bg-danger';
                break;
                case 2 :
                    $arr_priorities[$priorities_key]['label'] = 'bg-warning text-black';
                break;
                case 3 :
                    $arr_priorities[$priorities_key]['label'] = 'bg-primary';
                break;
            }

        }

        if ( !Auth::check() ){

            return redirect( route('home') );
        
        }

        return view('pagina', ['slug_page'=>'tarefas', 'page_slug'=>'tarefas', 'owners_tasks'=>$owners_tasks, 'statuses_tasks'=>$statuses_tasks, 'arr_priorities' => $arr_priorities, 'priorities_tasks' => $priorities_tasks, 'view_mode' => 'kanban', 'statuses_tasks_values_in_line' => $statuses_tasks_values_in_line, 'tarefa_store_by_status' => $tarefa_store_by_status]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefas, $id="")
    {
        $get_tarefa = $tarefas->store('tasks_by_id', $id, "");
        
        $get_tarefa = $get_tarefa[0];
        
        // Build Label Priorities

        $priorities_tasks = $this->priorities_tasks();

        $arr_priorities = array();
        
        foreach( $priorities_tasks as $priorities_key => $priorities_value ){

            $arr_priorities[$priorities_key]['name'] = $priorities_value;

            switch($priorities_key){
                
                case 1 :
                    $arr_priorities[$priorities_key]['label'] = 'bg-danger';
                break;
                case 2 :
                    $arr_priorities[$priorities_key]['label'] = 'bg-warning text-black';
                break;
                case 3 :
                    $arr_priorities[$priorities_key]['label'] = 'bg-primary';
                break;
            }

        }

        $get_tarefa->priority_name = $arr_priorities[$get_tarefa->priority]['name'];
        $get_tarefa->priority_label = $arr_priorities[$get_tarefa->priority]['label'];

        // Build user details

        $user_details = $tarefas->users( $get_tarefa->owner_id )[0];

        $get_tarefa->owner_name = $user_details->name;

        
        return json_encode( $get_tarefa );
        
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

    public function task_dragdrop_reorder()
    {
        $token       = $_POST['_token'];
        $tasks_array = $_POST['tasks_array'];

        $tasks_array_decode = json_decode($tasks_array);
        

        foreach((array) $tasks_array_decode as $key => $value) {
            foreach((array) $value as $task_item_key => $task_item_value) {
                $status = explode('_',$key);
                $status = $status[1];
                $data_task['status'] = $status;
                $data_task['order_in_card'] = $task_item_key;
                $this->update_task_ajax_kanban($task_item_value,$data_task);
            }
        }
        $success = true;

        if ( $success ) {
               
            $type = 'success';
            $msg = 'Tarefas atualizadas com sucesso.';
            // $url_redirect = route('tarefas.details', $tarefa_id);
            $url_redirect = route('tarefas.listagem');
        } else {
            $type = 'error';
            $msg = 'Algum erro ocorreu ao tentar atualizar as tarefas.';
            $url_redirect = route('tarefas.listagem');
        }

        $this->notificationApp($type,$msg);
        return $url_redirect;

        //return json_encode($data_task);

    }

    public function update_task_ajax_kanban($id_task="", $data_task=""){

        $tarefa_model = new Tarefa;

        $tarefa = $tarefa_model->find($id_task);

        $tarefa->status          =  $data_task['status'];
        $tarefa->order_in_card   =  $data_task['order_in_card'];

        $tarefa->save();
        
        //=======================
        // Start - Send Email Notification
        // Para funcionar, terei de criar um meio de identificar quais TASKS de fato foram alteradas e aplicar a mudança somente à elas, pois a requisição está processando todas as tasks.
        //=======================
        //
        // $owner_tarefa_details = $tarefa_model->users( $tarefa->owner_id )[0];
        // $destinatario = $owner_tarefa_details->email;
        // Mail::to($destinatario)->send( new EmailAtualizaStatusTarefa($tarefa, $this->priorities_tasks(), $this->statuses_tasks()));

        //=======================
        // End - Send Email Notification
        //=======================

    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTarefaRequest  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id_task="")
    {
            $tarefa = new Tarefa();
            $tarefa = $tarefa->find($id_task);

            $tarefa->name                   = $request->input('name');
            $tarefa->description            = $request->input('description');
            $tarefa->project_id             = 1;
            $tarefa->user_id                = Auth::id();
            $tarefa->owner_id               = $request->input('owner_id');
            $tarefa->status                 = $request->input('status');
            $tarefa->priority               = $request->input('priority');
            $tarefa->start_datetime         = $request->input('start_datetime');
            $tarefa->deadline               = $request->input('deadline');


            $tarefa->save();
           

            if ( $tarefa ) {
               
                $type = 'success';
                $msg = 'Tarefa atualizada com sucesso.';
                $url_redirect = route('tarefas.listagem');
            } else {
                $type = 'error';
                $msg = 'Algum erro ocorreu ao tentar atualziar a tarefa.';
                $url_redirect = route('tarefas.listagem');
            }

            //=======================
            // Start - Send Email Notification
            //=======================
            $model_tarefa = new Tarefa;
            $owner_tarefa_details = $model_tarefa->users( $tarefa->owner_id )[0];
            $destinatario = $owner_tarefa_details->email;
            Mail::to($destinatario)->send( new EmailAtualizaTarefa($tarefa, $this->priorities_tasks(), $this->statuses_tasks()));
            //=======================
            // End - Send Email Notification
            //=======================            
       
       
            $this->notificationApp($type,$msg);
            return redirect( $url_redirect );
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy($task_id)
    {
        $tarefa_model = new Tarefa();
        $tarefa = $tarefa_model->find($task_id);

        $tarefa->delete();

        // $tarefa = '';

        if ( $tarefa ) {
               
            $type = 'success';
            $msg = 'Tarefa deletada com sucesso.';
            $url_redirect = route('tarefas.listagem');
        } else {
            $type = 'error';
            $msg = 'Algum erro ocorreu ao tentar deletar a tarefa.';
            $url_redirect = route('tarefas.listagem');
        }

        //=======================
        // Start - Send Email Notification
        //=======================

        $owner_tarefa_details = $tarefa_model->users( $tarefa->owner_id )[0];
        $destinatario = $owner_tarefa_details->email;
        Mail::to($destinatario)->send( new EmailDeletaTarefa($tarefa, $this->priorities_tasks(), $this->statuses_tasks()));

        //=======================
        // End - Send Email Notification
        //=======================
   
   
    $this->notificationApp($type,$msg);
    return redirect( $url_redirect );


    }

    public function statuses_tasks()
    {
        $tasks_status = array(
            1 => 'Não Iniciada',
            2 => 'Em andamento',
            3 => 'Concluída',
            4 => 'Pausada',
            5 => 'Atrasada',
            6 => 'Suspensa',
        );
        return $tasks_status;
    }

    public function priorities_tasks()
    {
        $tasks_status = array(
            1 => 'Alta',
            2 => 'Média',
            3 => 'Baixa'
        );
        return $tasks_status;
    }
}

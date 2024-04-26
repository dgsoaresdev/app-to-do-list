<?php

namespace App\Mail;

use App\Models\Tarefa;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailAtualizaTarefa extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $start_datetime;
    public $deadline;
    public $priority;
    public $status;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( Tarefa $tarefa, $priorities="", $statuses="" )
    {
        $this->name = $tarefa->name;
        $this->start_datetime = date('d/m/Y H:i', strtotime( $tarefa->start_datetime ));
        $this->deadline = date('d/m/Y H:i', strtotime( $tarefa->deadline ));
        $this->priority = $priorities[$tarefa->priority];
        $this->status   = $statuses[$tarefa->status];
        $this->url = 'http://localhost:8000/tarefas/listagem';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.email-atualiza-tarefa')->subject('Uma tarefa atribuída a você foi atualizada.');
    }
}

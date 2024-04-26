@component('mail::message')
# {{ $name }}

A tarefa {{ $name }} foi deletada.

Data de início: {{ $start_datetime }}

Data de conclusão: {{ $deadline }}

Prioridade: {{ $priority }}

Status: {{ $status }}

@component('mail::button', ['url' => $url ])
Clique aqui para ver outras tarefas
@endcomponent

Att,<br>
{{ config('app.name') }}
@endcomponent

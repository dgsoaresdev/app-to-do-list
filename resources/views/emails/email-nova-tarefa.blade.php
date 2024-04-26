@component('mail::message')
# {{ $name }}

A tarefa {{ $name }} foi atribuída a você.

Data de início: {{ $start_datetime }}

Data de conclusão: {{ $deadline }}

Prioridade: {{ $priority }}

Status: {{ $status }}

@component('mail::button', ['url' => $url ])
Clique aqui para ver a tarefa
@endcomponent

Att,<br>
{{ config('app.name') }}
@endcomponent

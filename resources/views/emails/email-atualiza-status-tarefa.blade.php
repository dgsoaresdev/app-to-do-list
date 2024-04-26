@component('mail::message')
# {{ $name }}

A tarefa {{ $name }} teve o seu status alterado recentemente.

Data de início: {{ $start_datetime }}

Data de conclusão: {{ $deadline }}

Prioridade: {{ $priority }}

Novo status: {{ $status }}

@component('mail::button', ['url' => $url ])
Clique aqui para ver a tarefa
@endcomponent

Att,<br>
{{ config('app.name') }}
@endcomponent

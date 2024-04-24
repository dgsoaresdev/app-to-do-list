<h5 class="font-18">Dados da tarefa</h5>
<hr>
<div class="col-xl-12">
<form action="{{ route('tarefas.adicionar.create') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome da tarefa</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') ? old('name') : (isset( $contact_details['name']) ? $contact_details['name'] : '') }}" placeholder="Dê um nome à tarefa...">
    </div>
        
    <div class="mb-3">
        <label for="description" class="form-label">Descreva a tarefa</label>
        <textarea id="description" name="description" class="form-control" rows="5">{{ old('description') ?  old('description') : (isset($contact_details['description']) ? $contact_details['description'] : '') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="owner_id" class="form-label">Responsável pela tarefa</label>
        <select class="form-control select2" name="owner_id" id="owner_id" data-toggle="select2">
            <option disabled>Selecione</option>
            
            @foreach ( $users as $user )
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
            
        </select>
    </div>
    <div class="mb-3">
            <label for="status" class="form-label">Status da tarefa</label>
            <select class="form-control select2" name="status" id="status" data-toggle="select2">
                <option disabled>Selecione</option>

                @foreach( $statuses_tasks as $status_key => $status_value )
                    <option value="{{ $status_key }}">{{ $status_value }}</option>
                @endforeach
                
                {{-- @foreach ( $users as $user )
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach --}}
                
            </select>
    </div>
    <div class="mb-3">
            <label for="priority" class="form-label">Prioridade da tarefa</label>
            <select class="form-control select2" name="priority" id="priority" data-toggle="select2">
                <option disabled>Selecione</option>

                @foreach( $priorities_tasks as $priority_key => $priority_value )
                    <option value="{{ $priority_key }}">{{ $priority_value }}</option>
                @endforeach
                
                {{-- @foreach ( $users as $user )
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach --}}
                
            </select>
    </div>
 





    <div class="mb-3">
        <label class="form-label" for="start_datetime">Data de início</label>
       <input class="form-control bg-white datepicker" id="start_datetime" name="start_datetime" data-date-format="Y-m-d H:i:s" data-enable-time="true" placeholder="Dia e Hora">
    </div>
    
    <div class="mb-3">
        <label class="form-label" for="deadline">Data de conclusão</label>
        <input class="form-control bg-white datepicker" id="deadline" name="deadline" data-date-format="Y-m-d H:i:s" data-enable-time="true" placeholder="Dia e Hora">
    </div>
    
    <div class="mt-3 mb-3 mb-sm-0 text-right">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>

</div> <!-- end col-->
</form>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

    <script>
    flatpickr('.datepicker', {
        // put options here if your don't want to add them via data- attributes
    });
    </script>


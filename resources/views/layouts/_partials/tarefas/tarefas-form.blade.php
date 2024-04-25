<h5 class="font-18">Dados da tarefa</h5>
<hr>
<div class="col-xl-12">
<form id="FormTaskModal" action="{{ $action_route }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome da tarefa</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') ? old('name') : (isset( $tarefa->name) ? $tarefa->name : '') }}" placeholder="Dê um nome à tarefa..." required_modal>
    </div>
        
    <div class="mb-3">
        <label for="description" class="form-label">Descreva a tarefa</label>
        <textarea id="description" name="description" class="form-control" rows="5">{{ old('description') ?  old('description') : (isset($tarefa->description) ? $tarefa->description : '') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="owner_id" class="form-label">Responsável pela tarefa</label>
        <select class="form-control select2" name="owner_id" id="owner_id" data-toggle="select2" required_modal>
            <option selected disabled>Selecione</option>
            
            @foreach ( $users as $user )
                @if( $tarefa->owner_id && $tarefa->owner_id == $user->id )
                    @php $selected = ' selected="selected" '; @endphp
                @else
                    @php $selected = ''; @endphp
                @endif
                    <option value="{{ $user->id }}" {{ $selected }}>{{ $user->name }}</option>
            @endforeach
            
        </select>
    </div>
    <div class="mb-3">
            <label for="status" class="form-label">Status da tarefa</label>
            <select class="form-control select2" name="status" id="status" data-toggle="select2" required_modal>
                <option selected disabled>Selecione</option>

                @foreach( $statuses_tasks as $status_key => $status_value )

                    @if( $tarefa->status && $tarefa->status == $status_key )
                        @php $selected = ' selected="selected" '; @endphp
                    @else
                        @php $selected = ''; @endphp
                    @endif
                    
                    <option value="{{ $status_key }}" {{ $selected }}>{{ $status_value }}</option>
                @endforeach
                
                {{-- @foreach ( $users as $user )
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach --}}
                
            </select>
    </div>
    <div class="mb-3">
            <label for="priority" class="form-label">Prioridade da tarefa</label>
            <select class="form-control select2" name="priority" id="priority" data-toggle="select2" required_modal>
                <option selected disabled>Selecione</option>

                @foreach( $priorities_tasks as $priority_key => $priority_value )

                    @if( $tarefa->priority && $tarefa->priority == $priority_key )
                        @php $selected = ' selected="selected" '; @endphp
                    @else
                        @php $selected = ''; @endphp
                    @endif

                    <option value="{{ $priority_key }}" {{ $selected }}>{{ $priority_value }}</option>
                @endforeach
                
                {{-- @foreach ( $users as $user )
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach --}}
                
            </select>
    </div>
 





    <div class="mb-3">
        <label class="form-label" for="start_datetime">Data de início</label>
       <input class="form-control bg-white datepicker" id="start_datetime" name="start_datetime" data-date-format="Y-m-d H:i:s" data-enable-time="true" placeholder="Dia e Hora" value="{{ old('name') ? old('name') : (isset( $tarefa->start_datetime) ? $tarefa->start_datetime : '') }}" required_modal>
    </div>
    
    <div class="mb-3">
        <label class="form-label" for="deadline">Data de conclusão</label>
        <input class="form-control bg-white datepicker" id="deadline" name="deadline" data-date-format="Y-m-d H:i:s" data-enable-time="true" placeholder="Dia e Hora" value="{{ old('name') ? old('name') : (isset( $tarefa->deadline) ? $tarefa->deadline : '') }}" required_modal>
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

    // Validation

    $("#FormTaskModal").submit(function (event) {

  //if ($("input[Name='name']").val().length < 10) {
    //alert("first Input must have 4 characters according to my custom validation!");

    var requiredies = $(this).find('[required_modal]');
    var requiredies_empty = [];

     requiredies.each(function () {  
      // console.log( this.id );
       if( $(this).val() < 1 ){
        console.log(this.id);
        requiredies_empty.push(this.id);
        $(this).addClass('FieldRequiredAlert');
       }
     });

    //console.log(requiredies);
    
    event.preventDefault();
    return;
  //}
  //alert("Values are correct!");

});


</script>

    <script>
    flatpickr('.datepicker', {
        // put options here if your don't want to add them via data- attributes
    });
    </script>


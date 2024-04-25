                    
<div class="content tasks_kanban_container">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tarefas</li>
                            <li class="breadcrumb-item active">Listagem</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tarefas</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2 mb-sm-0">
                            <div class="col-sm-5">
                                <a class="btn btn-primary offCanvasButton" data-bs-toggle="offcanvas" href="{{ route('tarefas.adicionar') }}" data-bs-title="Adicionar tarefa" role="button" aria-controls="offcanvasRight" 
            data-bs-toggle="offcanvasRight" data-bs-target="#offcanvasRight"><i class="mdi mdi-plus-circle me-2"></i>Adicionar tarefa</a>
                            </div>
                            <div class="col-sm-7">
                                <div class="text-sm-end">
                                    <button type="button" class="btn btn-secondary mb-2 me-1 mb-sm-0"><i class="mdi mdi-cog"></i></button>
                                    <button type="button" class="btn btn-light mb-2 me-1 mb-sm-0">Importar</button>
                                    <button type="button" class="btn btn-light mb-2 mb-sm-0">Exportar</button>
                                </div>
                            </div><!-- end col-->
                        </div>
                        <div class="row">
                                <form method="GET" action="{{ route('tarefas.listagem') }}" class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between mt-0 mb-2">
                                    <div class="col-5 col-sm-5 col-md-4">
                                        <div class="d-flex align-items-center">
                                            <label for="status-select" class="me-2">Priodade</label>
                                            <select class="form-select" id="zona_id" name="zona_id"> 
                                                <option selected>Selecione...</option>
                                                @foreach( $priorities_tasks as $priorities_key => $priorities_value )
                                                    <option value="{{ $priorities_key }}">{{ $priorities_value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-5 col-sm-5 col-md-4">
                                        <div class="d-flex align-items-center">
                                            <label for="status-select" class="me-2">Status</label>
                                            <select class="form-select" id="status-select" name="status-select"> 
                                                <option selected>Selecione...</option>
                                                @foreach( $statuses_tasks as $status_key => $status_value )
                                                    <option value="{{ $status_key }}">{{ $status_value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2 col-sm-2 d-flex justify-content-start">
                                        <button type="submit" class="btn btn-secondary">Filtrar</button>
                                    </div>
                                </form>
                        </div>
                        @if( $view_mode && $view_mode === 'list')
                        <div class="table-responsive">
                            <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Administradora</th>
                                        <th>Responsável</th>
                                        <th>Zona</th>
                                        <th>Corretoras</th>
                                        <th>Indicadores</th>
                                        <th>Indicações</th>
                                        <th>Status</th>
                                        <th style="width: 75px;">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="row">
                                
                                <div class="d-flex justify-content-center mb-3 mt-1">
                                    @csrf
                                    <button class="btn btn-success" onclick="sort()">SALVAR ALTERAÇÕES</button>
                                </div>

                            <div class="col-12">
                                <div class="board">
                                 @foreach( $statuses_tasks as $status_key => $status_value )

                                 <div class="tasks tasksDragular" @if( $status_key == 0 ) data-plugin="dragula" data-containers='{{ $statuses_tasks_values_in_line }}' @endif >
                                        <h5 class="mt-0 task-header text-uppercase">{{ $status_value }}</h5>
                                        
                                        <div id="status_{{ $status_key }}" class="task-list-items draggable-item-" >

                                            <!-- Task Item -->
                                            @forelse ( $tarefa_store_by_status[$status_key] as $tarefa_store_by_status_key => $tarefa_store_by_status_value )
                                                {{-- {{ $tarefa_store_by_status_value->name }} --}}
                                                <div id="{{ $tarefa_store_by_status_value->id }}" class="card mb-0 draggable-item" draggable="true">

                                               

                                                <div class="card-body p-3">
                                                    <small class="float-end text-muted">{{ date('d/m/Y', strtotime($tarefa_store_by_status_value->created_at) ) }}</small>
                                                    <span class="badge {{ $arr_priorities[$tarefa_store_by_status_value->priority]['label'] }}">{{ $arr_priorities[$tarefa_store_by_status_value->priority]['name']}}</span>

                                                    <h5 class="mt-2 mb-2">
                                                        <a href="{{ route('tarefas.open', $tarefa_store_by_status_value->id)}}" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body ModalButton">{{ $tarefa_store_by_status_value->name }}</a>
                                                    </h5>

                                                    <p class="mb-0">
                                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                            <small><span class="text-muted">Início:</span> <strong>{{ date('d/m/Y - H:i', strtotime($tarefa_store_by_status_value->start_datetime) ) }}</strong></small>
                                                        </span>
                                                        <span class="text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-calendar-check text-muted"></i>
                                                            <small><span class="text-muted">Conclusão:</span> <strong>{{ date('d/m/Y - H:i', strtotime($tarefa_store_by_status_value->deadline) ) }}</strong></small>
                                                        </span>
                                                    </p>

                                                    <div class="dropdown float-end">
                                                    
                                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <!-- item-->
                                                            <a href="{{ route('tarefas.open', $tarefa_store_by_status_value->id)}}" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="dropdown-item ModalButton"><i class="mdi mdi-eye me-1"></i>Abrir</a>
                                                            <!-- item-->
                                                            <a class="offCanvasButton dropdown-item" data-bs-toggle="offcanvas" href="{{ route('tarefas.editar',$tarefa_store_by_status_value->id) }}" data-bs-title="Editar tarefa" role="button" aria-controls="offcanvasRight" 
            data-bs-toggle="offcanvasRight" data-bs-target="#offcanvasRight"><i class="mdi mdi-pencil me-1"></i>Editar</a>
                                                            <!-- item-->
                                                            <a href="{{ route('tarefas.deletar',$tarefa_store_by_status_value->id) }}" class="dropdown-item ModalButton" data-bs-title="Deletar tarefa" data-bs-toggle="modal" data-bs-target="#danger-header-modal">
                                                                <i class="mdi mdi-delete me-1"></i>Deletar
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <p class="mb-0">
                                                       <div class="avatar-sm">
                                                            <span class="avatar-title bg-secondary rounded-circle">
                                                                <i class="mdi mdi-account"></i>
                                                            </span>
                                                        </div>
                                                        <span class="align-middle">{{ $owners_tasks[$tarefa_store_by_status_value->owner_id]->name }}</span>
                                                    </p>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- Task Item End -->
                                            @empty
                                               
                                            @endforelse
                                            
                                        </div> <!-- end company-list-1-->
                                    </div>
                                 @endforeach
                                </div> <!-- end .board-->
                            </div> <!-- end col -->
                            <div class="d-flex justify-content-center mb-3 mt-1">       
                                <button class="btn btn-success" onclick="sort()">SALVAR ALTERAÇÕES</button>
                            </div>
                        </div>
                        <!-- end row-->
                        <!-- MODALS -------------------------------------------------------------------------->
                        <!--  Alert --------------->

                        <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-danger">
                                        <h4 class="modal-title" id="danger-header-modalLabel">Deletar tarefa</h4>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 id="AlertRegisterTitle">Carregando...</h5>
                                        <p id="AlertRegisterText">Carregando...</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                                        <a id="ModalButtonDelete" href="javascript:void(0)" class="btn btn-danger ModalButtonDelete">DELETAR</a>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <!--  Task details modal -->
                        <div class="modal fade task-modal-content" id="task-detail-modal" tabindex="-1" role="dialog" aria-labelledby="TaskDetailModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="TaskDetailModalLabel">Carregando...<span class="badge ms-2">Carregando...</span></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    
                                        <div class="p-2">
                                            <h5 class="mt-0">Descrição</h5>                    
                                            <p id="task-detail-modal-description" class="mb-4">
                                                Carregando...
                                            </p>
                    
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-4">
                                                        <h5>Criado em:</h5>
                                                        <p class="TaskModal-created_at"><small class="text-muted"></small></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-4">
                                                        <h5>Iniciar em:</h5>
                                                        <p class="TaskModal-start_datetime"><small class="text-muted"></small></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-4">
                                                        <h5>Concluir em:</h5>
                                                        <p class="TaskModal-deadline"><small class="text-muted"></small></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="mb-4" id="tooltip-container">
                                                        <h5>Responsável:</h5>
                                                        <div class="TaskModal-owner"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row-->                                            

                                        </div> <!-- .p-2 -->
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        @endif
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        
    </div> <!-- container -->

</div> <!-- content -->

                
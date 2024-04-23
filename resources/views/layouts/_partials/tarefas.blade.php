                    
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
{{--                                 
                                @foreach( $administradoras as $administradora_details)
                                <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td class="table-user">
                                            <img src="{{ asset('assets/images/favicon.png') }}" alt="table-user" class="me-2 rounded-circle">
                                            <a href="{{ route('administradoras.details', $administradora_details['id'])}}" class="text-body fw-semibold">{{ $administradora_details['title'] }}</a>
                                        </td>
                                        <td class="table-user">
                                        <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt="table-user" class="me-2 rounded-circle">
                                            Paul J. Friend
                                        </td>
                                        <td>
                                            <span class="fw-semibold">Ceará (NE)</span>
                                        </td>
                                        <td>
                                            101
                                        </td>
                                        <td>
                                            427
                                        </td>
                                        
                                        <td>
                                            <div class="spark-chart" data-dataset="[25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54]"></div>
                                        </td>
                                        <td>
                                                <input type="checkbox" id="status-{{ $administradora_details['id'] }}" name="status" value="1" checked data-switch="success"/>
                                                <label for="status-{{ $administradora_details['id'] }}" data-on-label="ON" data-off-label="OFF"></label>
                                        </td>
                                        <td>
                                            <a href="{{ route('administradoras.details', $administradora_details['id'] )}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                 --}}
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-12">
                                <div class="board">
                                    <div class="tasks" data-plugin="dragula" data-containers='["task-list-one", "task-list-two", "task-list-three", "task-list-four"]'>
                                        <h5 class="mt-0 task-header text-uppercase">Não iniciadas (3)</h5>
                                        
                                        <div id="task-list-one" class="task-list-items">

                                            <!-- Task Item -->
                                            <div class="card mb-0">
                                                <div class="card-body p-3">
                                                    <small class="float-end text-muted">18 Jul 2018</small>
                                                    <span class="badge bg-danger">High</span>

                                                    <h5 class="mt-2 mb-2">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">iOS App home page</a>
                                                    </h5>

                                                    <p class="mb-0">
                                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                            iOS
                                                        </span>
                                                        <span class="text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                            <b>74</b> Comments
                                                        </span>
                                                    </p>

                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                                        </div>
                                                    </div>

                                                    <p class="mb-0">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="user-img" class="avatar-xs rounded-circle me-1" />
                                                        <span class="align-middle">Robert Carlile</span>
                                                    </p>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- Task Item End -->

                                            <!-- Task Item -->
                                            <div class="card mb-0">
                                                <div class="card-body p-3">
                                                    <small class="float-end text-muted">18 Jul 2018</small>
                                                    <span class="badge bg-secondary text-light">Medium</span>

                                                    <h5 class="mt-2 mb-2">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Topnav layout design</a>
                                                    </h5>

                                                    <p class="mb-0">
                                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                            Hyper
                                                        </span>
                                                        <span class="text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                            <b>28</b> Comments
                                                        </span>
                                                    </p>

                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                                        </div>
                                                    </div>

                                                    <p class="mb-0">
                                                        <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="avatar-xs rounded-circle me-1" />
                                                        <span class="align-middle">Coder Themes</span>
                                                    </p>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- Task Item End -->

                                            <!-- Task Item -->
                                            <div class="card mb-0">
                                                <div class="card-body p-3">
                                                    <small class="float-end text-muted">11 Jul 2018</small>
                                                    <span class="badge bg-success">Low</span>

                                                    <h5 class="mt-2 mb-2">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Invite user to a project</a>
                                                    </h5>

                                                    <p class="mb-0">
                                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                            CRM
                                                        </span>
                                                        <span class="text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                            <b>68</b> Comments
                                                        </span>
                                                    </p>

                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                                        </div>
                                                    </div>

                                                    <p class="mb-0">
                                                        <img src="assets/images/users/avatar-3.jpg" alt="user-img" class="avatar-xs rounded-circle me-1" />
                                                        <span class="align-middle">Lucas Hardy</span>
                                                    </p>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- Task Item End -->
                                            
                                        </div> <!-- end company-list-1-->
                                    </div>

                                    <div class="tasks">
                                        <h5 class="mt-0 task-header text-uppercase">Em andamento (2)</h5>
                                        
                                        <div id="task-list-two" class="task-list-items">

                                            <!-- Task Item -->
                                            <div class="card mb-0">
                                                <div class="card-body p-3">
                                                    <small class="float-end text-muted">22 Jun 2018</small>
                                                    <span class="badge bg-secondary text-light">Medium</span>

                                                    <h5 class="mt-2 mb-2">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Write a release note</a>
                                                    </h5>

                                                    <p class="mb-0">
                                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                            Hyper
                                                        </span>
                                                        <span class="text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                            <b>17</b> Comments
                                                        </span>
                                                    </p>

                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                                        </div>
                                                    </div>

                                                    <p class="mb-0">
                                                        <img src="assets/images/users/avatar-5.jpg" alt="user-img" class="avatar-xs rounded-circle me-1" />
                                                        <span class="align-middle">Sean White</span>
                                                    </p>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- Task Item End -->

                                            <!-- Task Item -->
                                            <div class="card mb-0">
                                                <div class="card-body p-3">
                                                    <small class="float-end text-muted">19 Jun 2018</small>
                                                    <span class="badge bg-success">Low</span>

                                                    <h5 class="mt-2 mb-2">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Enable analytics tracking</a>
                                                    </h5>

                                                    <p class="mb-0">
                                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                            CRM
                                                        </span>
                                                        <span class="text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                            <b>48</b> Comments
                                                        </span>
                                                    </p>

                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                                        </div>
                                                    </div>

                                                    <p class="mb-0">
                                                        <img src="assets/images/users/avatar-6.jpg" alt="user-img" class="avatar-xs rounded-circle me-1" />
                                                        <span class="align-middle">Louis Allen</span>
                                                    </p>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- Task Item End -->

                                        </div> <!-- end company-list-2-->
                                    </div>


                                    <div class="tasks">
                                        <h5 class="mt-0 task-header text-uppercase">Pausadas (4)</h5>
                                        <div id="task-list-three" class="task-list-items">

                                            <!-- Task Item -->
                                            <div class="card mb-0">
                                                <div class="card-body p-3">
                                                    <small class="float-end text-muted">2 May 2018</small>
                                                    <span class="badge bg-danger">High</span>

                                                    <h5 class="mt-2 mb-2">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Kanban board design</a>
                                                    </h5>

                                                    <p class="mb-0">
                                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                            CRM
                                                        </span>
                                                        <span class="text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                            <b>65</b> Comments
                                                        </span>
                                                    </p>

                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                                        </div>
                                                    </div>

                                                    <p class="mb-0">
                                                        <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="avatar-xs rounded-circle me-1" />
                                                        <span class="align-middle">Coder Themes</span>
                                                    </p>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- Task Item End -->

                                            <!-- Task Item -->
                                            <div class="card mb-0">
                                                <div class="card-body p-3">
                                                    <small class="float-end text-muted">7 May 2018</small>
                                                    <span class="badge bg-secondary text-light">Medium</span>

                                                    <h5 class="mt-2 mb-2">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Code HTML email template</a>
                                                    </h5>

                                                    <p class="mb-0">
                                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                            CRM
                                                        </span>
                                                        <span class="text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                            <b>106</b> Comments
                                                        </span>
                                                    </p>

                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                                        </div>
                                                    </div>

                                                    <p class="mb-0">
                                                        <img src="assets/images/users/avatar-9.jpg" alt="user-img" class="avatar-xs rounded-circle me-1" />
                                                        <span class="align-middle">Zak Turnbull</span>
                                                    </p>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- Task Item End -->

                                            <!-- Task Item -->
                                            <div class="card mb-0">
                                                <div class="card-body p-3">
                                                    <small class="float-end text-muted">8 Jul 2018</small>
                                                    <span class="badge bg-secondary text-light">Medium</span>

                                                    <h5 class="mt-2 mb-2">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Brand logo design</a>
                                                    </h5>

                                                    <p class="mb-0">
                                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                            Design
                                                        </span>
                                                        <span class="text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                            <b>95</b> Comments
                                                        </span>
                                                    </p>

                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                                        </div>
                                                    </div>

                                                    <p class="mb-0">
                                                        <img src="assets/images/users/avatar-8.jpg" alt="user-img" class="avatar-xs rounded-circle me-1" />
                                                        <span class="align-middle">Lily Parkin</span>
                                                    </p>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- Task Item End -->

                                            <!-- Task Item -->
                                            <div class="card mb-0">
                                                <div class="card-body p-3">
                                                    <small class="float-end text-muted">22 Jul 2018</small>
                                                    <span class="badge bg-danger">High</span>

                                                    <h5 class="mt-2 mb-2">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Improve animation loader</a>
                                                    </h5>

                                                    <p class="mb-0">
                                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                            CRM
                                                        </span>
                                                        <span class="text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                            <b>39</b> Comments
                                                        </span>
                                                    </p>

                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                                        </div>
                                                    </div>

                                                    <p class="mb-0">
                                                        <img src="assets/images/users/avatar-4.jpg" alt="user-img" class="avatar-xs rounded-circle me-1" />
                                                        <span class="align-middle">Riley Steele</span>
                                                    </p>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- Task Item End -->

                                        </div> <!-- end company-list-3-->
                                    </div>

                                    <div class="tasks">
                                        <h5 class="mt-0 task-header text-uppercase">Concluídas (1)</h5>
                                        <div id="task-list-four" class="task-list-items">

                                            <!-- Task Item -->
                                            <div class="card mb-0">
                                                <div class="card-body p-3">
                                                    <small class="float-end text-muted">16 Jul 2018</small>
                                                    <span class="badge bg-success">Low</span>

                                                    <h5 class="mt-2 mb-2">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Dashboard design</a>
                                                    </h5>

                                                    <p class="mb-0">
                                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                            Hyper
                                                        </span>
                                                        <span class="text-nowrap mb-2 d-inline-block">
                                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                                            <b>287</b> Comments
                                                        </span>
                                                    </p>

                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                                        </div>
                                                    </div>

                                                    <p class="mb-0">
                                                        <img src="assets/images/users/avatar-10.jpg" alt="user-img" class="avatar-xs rounded-circle me-1" />
                                                        <span class="align-middle">Harvey Dickinson</span>
                                                    </p>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- Task Item End -->
                                            
                                        </div> <!-- end company-list-4-->
                                    </div>

                                </div> <!-- end .board-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                        @endif
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        
    </div> <!-- container -->

</div> <!-- content -->

                
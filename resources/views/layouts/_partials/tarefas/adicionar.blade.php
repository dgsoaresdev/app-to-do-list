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
                            <li class="breadcrumb-item"><a href="{{ route('tarefas.listagem') }}">Administradoras</a></li>
                            <li class="breadcrumb-item active">Adicionar</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Adicionando nova tarefa</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                     @foreach($errors->all() as $error_value)
                        {{ $error_value }} <br>
                    @endforeach

                    <form action="{{ route('tarefas.adicionar.create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- end row -->
                        <div class="mb-3 mt-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Adicionar tarefa<i class="mdi mdi-plus-circle ms-2"></i></button>
                        </div>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->
        
    </div> <!-- container -->
    

</div> <!-- content -->




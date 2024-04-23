
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page email-title -->
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('administradoras.listagem') }}">Administradoras</a></li>
                            <li class="breadcrumb-item active">{{ $administradora_details['title'] }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Detalhes da Administradora</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- end page email-title --> 

        <div class="row">

            <!-- Right Sidebar -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Left sidebar -->
                        <div class="page-aside-left">

                            <div class="email-menu-list">
                                <a href="{{ route('administradoras.details', $id) }}" class="{{ $part != 'contatos' ? 'text-primary fw-bold' : 'text-secondary' }}"><i class="uil-building me-2"></i>Dados da empresa</a>
                                <a href="{{ route('administradoras.details', $id) }}/contatos" class="{{ $part === 'contatos' ? 'text-primary fw-bold' : 'text-secondary' }}"><i class="uil-users-alt me-2"></i>Contatos<span class="badge {{ $part === 'contatos' ? 'badge-primary-lighten' : 'badge-secondary-lighten' }} float-end ms-2">7</span></a>
                                <a href="#" class=""><i class="uil-lock-access me-2"></i>Funções e Permissões</a>
                                <a href="#" class=""><i class="uil-file-lock-alt me-2"></i>Log da administradora</a>
                            </div>

                        </div>
                        <!-- End Left sidebar -->

                        <div class="page-aside-right">
                        @if( $part && $part === 'contatos'  )
                            @include('layouts._partials.administradoras.administradoras-details-users')
                        @else
                            @include('layouts._partials.administradoras.administradoras-details-form', ['administradora_details'=>$administradora_details])
                        @endif

                            {{-- <div class="ContentTabs" id="AdministradoraForm">
                                @include('layouts._partials.administradoras.administradora-details-form')
                            </div>
                            <div class="ContentTabs" id="AdministradoraUsers" style="display:none;">
                                @include('layouts._partials.administradoras.administradora-details-users')
                            </div> --}}

                        </div> 
                        <!-- end inbox-rightbar-->
                    </div>

                    <div class="clearfix"></div>
                </div> <!-- end card-box -->

            </div> <!-- end Col -->
        </div><!-- End row -->
        
    </div> <!-- container -->

</div> <!-- content -->

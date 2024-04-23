<div class="row mb-2 mb-sm-0">
    <div class="col-sm-7">
        <h5 class="font-18">Contatos da administradora</h5>
        
    </div>
    <div class="col-sm-5">
        <div class="text-sm-end">
            {{-- <a class="btn btn-primary offCanvasButton" data-bs-toggle="offcanvas" href="{{ route('administradoras.details', $id) }}/contatos/adicionar" data-bs-title="Adicionar Contato" role="button" aria-controls="offcanvasExample" 
            data-bs-toggle="offcanvasExample" data-bs-target="#offcanvasExample">
               <i class="mdi mdi-plus-circle me-2"></i>Adicionar contato
            </a> --}}
            <a class="btn btn-primary offCanvasButton" data-bs-toggle="offcanvas" href="{{ route('administradoras.details', $id) }}/contatos/adicionar" data-bs-title="Adicionar Contato" role="button" aria-controls="offcanvasRight" 
            data-bs-toggle="offcanvasRight" data-bs-target="#offcanvasRight">
               <i class="mdi mdi-plus-circle me-2"></i>Adicionar contato
            </a>

            {{-- <button class="btn btn-primary mt-2 mt-md-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Toggle right offcanvas</button> --}}

        </div>
    </div><!-- end col-->
</div>
<hr>
{{-- <div class="row">
        <form method="GET" action="{{ route('administradoras.listagem') }}" class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between mt-0 mb-2">
            <div class="col-12 col-sm-4 col-md-4">
                <div class="d-flex align-items-center">
                    <label for="status-select" class="me-2">Administradora</label>
                    <select class="form-select" id="zona_id" name="zona_id"> 
                        <option selected>Selecione...</option>
                        <option value="111">Noma da Empresa</option>
                        <option value="222">Nome da Empresa</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-4">
                <div class="d-flex align-items-center">
                    <label for="status-select" class="me-2">Status</label>
                    <select class="form-select" id="status-select" name="status-select"> 
                        <option selected>Selecione...</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>
            </div>
            <div class="col-4 col-sm-1 d-flex justify-content-start">
                <button type="submit" class="btn btn-secondary">Filtrar</button>
            </div>
            <div class="col-8 col-sm-3 d-flex justify-content-end">
                <div class="text-sm-end">
                    <button type="button" class="btn btn-secondary mb-2 me-1 mb-sm-0"><i class="mdi mdi-cog"></i></button>
                    <button type="button" class="btn btn-light mb-2 mb-sm-0">Exportar</button>
                </div>
            </div>
        </form>
</div> --}}
<div class="table-responsive">
    <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="administradora-details-users">
        <thead class="table-light">
            <tr>
                <th style="width: 20px;">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="customCheck1">
                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                    </div>
                </th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Função</th>
                <th>Status</th>
                <th style="width: 75px;">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contatos as $contato_key => $contato_details)
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="customCheck2">
                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                    </div>
                </td>
                <td class="table-user">
                @if( $contato_details['image'] )
                    <img src="{{  url('/uploads/users/'.$contato_details['id'].'/'.$contato_details['image']) }}" alt="{{ $contato_details['name'] }}" class="me-2 rounded-circle">
                    {{ $contato_details['name'] }}
                @else
                <div class="avatar-sm">
                    <span class="avatar-title bg-secondary-lighten text-secondary font-20 rounded-circle">
                        <small>Imagem</small>
                    </span>
                </div>
                {{ $contato_details['name'] }}
                @endif
                </td>
                <td>
                    {{ $contato_details['phone_number'] }}
                </td>
                <td>
                    {{ $contato_details['email'] }}
                </td>                                        
                <td>
                    <span class="badge badge-primary-lighten">{{ $contato_details['contato']->user_level }}</span>
                    {{-- <div class="spark-chart" data-dataset="[25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54]"></div> --}}
                </td>
                <td>
                <input type="checkbox" id="status-{{ $contato_details['id'] }}" name="status" value="1" checked data-switch="success" {{ $contato_details['contato']->status === 1 ? 'checked' : '' }}  />
                <label for="status-{{ $contato_details['id'] }}" data-on-label="ON" data-off-label="OFF"></label>
                    
                </td>
                <td>
                    <a href="javascript:void(0);" class="action-icon"> <i class="uil uil-eye"></i></a>
                      <a class="action-icon offCanvasButton" data-bs-toggle="offcanvas" href="{{ route('administradoras.details', $id) }}/contatos/editar/{{ $contato_details['id'] }}" data-bs-title="Editar Contato" role="button" aria-controls="offcanvasRight" 
            data-bs-toggle="offcanvasRight" data-bs-target="#offcanvasRight"><i class="mdi mdi-square-edit-outline"></i></a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

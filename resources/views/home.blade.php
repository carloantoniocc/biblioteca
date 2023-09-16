@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<!--Mensajes de Guardado o Actualización de Establecimientos-->
	<?php $message=Session::get('message') ?>
	@if($message == 'store')
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Usuario Creado Exitosamente
		</div>
	@elseif($message == 'update')
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Usuario Actualizado Exitosamente
		</div>
	@endif
	<!--FIN Mensajes de Guardado o Actualización de Establecimientos-->

<div class="container-fluid">    
    <div class="row flex-nowrap">

    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
            <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-5 d-none d-sm-inline">Workspaces </span>
            </a> <a class="dropdown-item" href="{{ URL::to('workspace/create') }}">New Workspace</a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    @foreach($workspaces as $workspace)
                    <li class="w-100">
                        <a class="nav-link px-0" href="{{ URL::to('/home') }}"> <span class="d-none d-sm-inline">{{ $workspace->name }}</span>1</a>
                    </li>
                    @endforeach
                </ul>
        </div>
    </div>

    <div class="col-md-8" >
    <div class="row flex-nowrap" >
               
        <div class="row">						
						<!-- Filtro de Numero de Documento -->
						<form class="form-horizontal" role="form" method="GET" action="{{ URL::to('home') }}">
							<!-- Filtro de Tipo de Documento -->
								<div class="input-group">
                                    <span class="input-group-btn margin-left">
                                        <a class="btn btn-sm btn-primary" href="{{ URL::to('page/create') }}">Crear Documento</a>
									</span>
                                    <select id="searchTipo" class="form-control input-sm " name="searchTipo" style="width:40%">
										<option value="">Buscar por Tipo de Documento</option>
										@foreach($workspaces as $workspace)
											<option value="{{ $workspace->id }}">{{ $workspace->name }}</option>
										@endforeach
									</select>
									<span class="input-group-btn ">
										<button class="btn btn-default btn-sm" type="submit">Ir</button>
									</span>
								</div>
						</form>		
		</div>












    </div>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#dd</th>
                <th scope="col">Name</th>
                <th scope="col">Tipo</th>
                <th scope="col">Action</th>   
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>id</td>
                    <td><a href="{{ URL::to('page/' . $page->id . '/edit') }}">{{ $page->name }}</a></td>
                    <td>carlos</td>
                    <td><a href="{{ URL::to('page/' . $page->id . '/edit') }}">Editar</a></td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>

        <div class="text-right">    
            Listado de documentos
        </div>    
        </tfoot>

        </table>

        <div class="text-right">    
            Total de registros : {{  $pages->total() }}
        </div>    
        <div class="text-center">
            <!--paginacion-->
            {{ $pages->appends(request()->input())->links() }}
        </div>
    </div>
</div>
</div>

@endsection



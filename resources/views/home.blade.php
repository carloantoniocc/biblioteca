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
    <div class="row">
        <div class="col-md-12 col-md-offset-0">


            <ol class="breadcrumb">
              <li><a href="{{ URL::to('/home') }}" >Home</a></li>
              <li class="active">Listado de Libros </li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading">Listado de Libros</div>
                <div class="panel-body">
                    {{ csrf_field() }} 
					<div class="row">
						<!-- Boton Crear Nueva Establecimiento -->
						<div class="col-md-6">
							<a class="btn btn-sm btn-primary" href="{{ URL::to('page/create') }}">Crear Libro</a>
						</div>


                        <p>
                            <a class="btn btn-sm btn-primary" href="{{ URL::to('buscarLibro/') }}">Buscar Libro</a>
                        </p>						
						
					</div>
					</br>
					<!-- Lista de Establecimientos -->		
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
								<thead>
								  <tr>
									
									<th>id</th>
									<th>Nombre</th>
									<th>Author</th>
									<th>Estado</th>
									<th>Editar</th>


								  </tr>
								</thead>
								<tbody>
								  @foreach($pages as $page)

								  <tr>
									
									<td>id</td>
									<td><a href="{{ URL::to('page/' . $page->id . '/edit') }}">{{ $page->name }}</a></td>
									<td>carlos</td>
									<td>
                                    @if( $page->active == 1 )
                                        Activo
                                    @else
                                        Inactivo
                                    @endif
									</td>
									<td><a href="{{ URL::to('page/' . $page->id . '/edit') }}">Editar</a></td>
								  </tr>
								  @endforeach
								</tbody>
							</table>
                            <div class="text-right">    
                                Total de registros : {{  $pages->total() }}
                            </div>    
                            <div class="text-center">

							<!--paginacion-->
							{{ $pages->appends(request()->input())->links() }}
								
						</div>
					</div>
					<!-- FIN Lista de Establecimientos -->			
                </div>
            </div>
        </div>
    </div>
</div>



















<!-- 



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
        
        <div >
        
            <a class="dropdown-item" href="{{ URL::to('page/create') }}">New Page</a>
        

            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Author</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                        <tr>
                        <th scope="row">1</th>
                        <td><a href="{{ URL::to('page/' . $page->id . '/edit') }}">{{ $page->name }}</a></td>
                        <td></td>
                        <td>
                            @if( $page->active == 1 )
                                Activo
                            @else
                                Inactivo
                            @endif
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
            {{ $pages->appends(request()->input())->links() }}
        </div>


    </div>
</div>

-->

@endsection



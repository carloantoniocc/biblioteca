@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row flex-nowrap">
        
        <!-- espacios --> 
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
        
        <div class="col py-3">
        
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
        {{$pages->links()}}




        </div>
    </div>
</div>


@endsection



@extends('layout')

{{-- @section('title','Proyecto | '.$project->title) --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-8 mx-auto">
                <div class="bg-white p-5 shadow rounded">
                    <h1 class="card-title">
                        <a href="{{ route('project.show',$project) }}">{{ $project->title }}</a>
                    </h1>
                    @if($project->category_id)
                    <a class="badge badge-secondary mb-3"
                        href="{{ route('categories.show',$project->category) }}"
                    >
                        {{ $project->category->nombre }}
                    </a>
                    @endif
                    <h6 class="card-subtitle">
                    {{$project->created_at->format('d/m/Y')}}
                    </h6>
                    <p>{{ $project->description }}</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('project.index') }}" class="btn btn-primary btn-sm">Regresar</a>
                        @auth()
                            <div class="btn-group btn-group-sm">
                                @can('update',$project)
                                    <a class="btn btn-primary" href="{{ route('project.edit', $project) }}">Editar</a>
                                @endcan
                                @can('delete',$project)
                                    <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-project').submit()" >Eliminar</a>
                                @endcan
                            </div>
                                @can('delete',$project)
                                    <form class="d-none" id="delete-project" method="POST" action="{{ route('project.destroy',$project) }}" >
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button>Eliminar</button> --}}
                                    </form>
                                @endcan
                        @endauth
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



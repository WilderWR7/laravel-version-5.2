@extends('layout')

{{-- @section('title','Proyecto | '.$project->title) --}}

@section('content')
    <div class="container">
        <div class="bg-white p-5 shadown rounded" >
            <h1>
                {{$project->title}}
            </h1>
            <p class="text-secundary">{{$project->description}}</p>
            <p class="text-black-50" >{{$project->created_at->diffForHumans()}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('project.index') }}">Regresar</a>
                @auth()
                <div class="btn-group btn-group-sm">
                <a class="btn btn-primary" href="{{ route('project.edit', $project) }}">Editar</a>
                <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-project').submit()" >Eliminar</a>
                </div>
                    <form class="d-none" id="delete-project" method="POST" action="{{ route('project.destroy',$project) }}" >
                        @csrf
                        @method('DELETE')
                        {{-- <button>Eliminar</button> --}}
                    </form>
                @endauth
            </div>
        </div>
    </div>
@endsection
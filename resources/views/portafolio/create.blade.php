@extends('layout')
@section('title','Crear Proyectos')
@section('content')

    @include('partials.validation-errors')
        <form method="POST" action="{{route('project.store')}}" >
            @include('portafolio._form')
            <button>Guardar</button>
        </form>
@endsection
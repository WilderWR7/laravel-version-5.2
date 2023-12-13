@extends('layout')
@section('title','Editar Proyecto')
@section('content')

    @include('partials.validation-errors')
    <form method="POST" action="{{route('project.update',$project)}}" >
        @method('PUT')
        @include('portafolio._form')
        <button>Actualizar</button>
    </form>
@endsection
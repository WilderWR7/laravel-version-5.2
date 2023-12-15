@extends('layout')
@section('title','Crear Proyectos')
@section('content')
<div class="container" >
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            @include('partials.validation-errors')
            <form class="bg-white py-3 px-4 shadown rounded" method="POST" action="{{route('project.store')}}" >
                <h1 class="display-4">Nuevo proyecto</h1>
                @include('portafolio._form',['btnText'=>'Guardar'])
            </form>
        </div>
    </div>

</div>
@endsection
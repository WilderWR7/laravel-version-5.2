@extends('layout')
@section('title','Editar Proyecto')
@section('content')

@include('partials.validation-errors')
<div class="container" >
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <form class="bg-white py-3 px-4 shadown rounded" method="POST" action="{{route('project.update',$project)}}" >
                @method('PUT')
                <h1 class="display-4">Nuevo proyecto</h1>
                @include('portafolio._form',['btnText'=> 'Actualizar'])
            </form>
        </div>
    </div>
</div>

@endsection
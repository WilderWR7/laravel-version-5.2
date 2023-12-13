@extends('layout')
@section('title','Portafolio')
@section('content')
    <h1>Portafolio</h1>
    <ul class="list" >
        <li> <a href="{{ route('project.create') }}">crear</a></li>   
        @forelse ($proyects as $project)
            <li> <a href="{{ route('project.show',$project) }}">{{$project->title}}</a></li>   
        @empty
            <li>No hay portafolios por mostrar</li>
        @endforelse
        {{$proyects->links() }}
    </ul>
@endsection
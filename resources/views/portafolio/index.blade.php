@extends('layout')
@section('title','Portafolio')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="m-0 display-4">Portafolio</h1>
        @auth()
            <a class="btn btn-primary" href="{{ route('project.create') }}">Crear Proyecto</a>  
        @endauth
    </div>
    <p class="lead text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci veritatis inventore libero neque praesentium atque dolores consequuntur explicabo. Rerum, ab nesciunt iusto voluptates corporis quod labore esse aliquid magni a.</p>
    <ul class="list-group" >
        @forelse ($proyects as $project)
            <li class="list-group-item border-0 mb-3 shadow-sm">
                <a class="d-flex justify-content-between align-items-center" href="{{ route('project.show',$project) }}">
                    <span class="text-secondary font-weight-bold">
                        {{$project->title}}
                    </span>
                    <span class="text-black-50">
                        {{$project->created_at->format('d/m/Y')}}
                    </span>
                </a>
            </li>   
        @empty
            <li class="list-group-item border-0 mb-3 shadow-sm">
                No hay portafolios por mostrar
            </li>
        @endforelse
        {!! $proyects->links() !!}
    </ul>
</div>
@endsection
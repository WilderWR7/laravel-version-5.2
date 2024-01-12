@extends('layout')
@section('title','Portafolio')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        @isset($category)
            <div class="d-flex flex-column">
                <h1 class="m-0 display-4">{{ $category->nombre }}</h1>
                <a class="mt-1" href="{{ route('project.index') }}" >Regresar al portafolio</a>
            </div>
        @else
            @admin {{-- probando --}}
                <h1 class="m-0 display-4">Portafolio</h1>
            @endadmin
        @endisset
        {{-- @can('create-projects') Comprueba los Gate  --}}
        {{-- @can('create-projects')  Call GETE --}}
        {{-- @can('create',$newProject) --}}
        @can('create-projects')
            <a class="btn btn-primary" href="{{ route('project.create') }}">Crear Proyecto</a>
        @endcan()
    </div>
    <p class="lead text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci veritatis inventore libero neque praesentium atque dolores consequuntur explicabo. Rerum, ab nesciunt iusto voluptates corporis quod labore esse aliquid magni a.</p>
    <div class="d-flex flex-wrap justify-content-between align-items-start" >
        @forelse ($proyects as $project)
            <div class="card border-0 shadow-sm mt-4 mx-auto" style="width: 18rem;">
                @if($project->image)
                    <img src="/storage/{{ $project->image }}" style="height: 150px; object-fit: cover;" alt="{{ $project->title }}" />
                @endif
                <div class="card-body">
                    <h5 class="card-title">
                    <a href="{{ route('project.show',$project) }}">{{ $project->title }}</a>
                    </h5>
                    <h6 class="card-subtitle">
                    {{-- {{$project->created_at->format('d-m-Y')}} TODO: arreglar --}}
                    </h6>
                    <p>{{ $project->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('project.show',$project) }}" class="btn btn-primary btn-sm">Ver más...</a>
                        @if ($project->category_id)
                            <a class="badge badge-secondary"
                                href="{{ route('categories.show',$project->category) }}"
                            >
                                {{ $project->category->nombre }}
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        @empty
            <li class="list-group-item border-0 mb-3 shadow-sm">
                No hay portafolios por mostrar
            </li>
        @endforelse
    </div>
    <div class="d-flex justify-content-center mt-2">
        {!! $proyects->links() !!}
    </div>
    @can('view-deleted-projects')
        @if (count($deletedProjects) !== 0)
            <h4>Papelera</h4>
        @endif
        <ul class="list-group" >
            @foreach ($deletedProjects as $project )
                <li class="list-group-item mt-2 d-flex">
                    {{ $project->title }}
                    @can('restore',$project)
                        {{-- <form method="POST" action="/asd/{{ $project->url }}/asd" > --}}
                        <form method="POST" action="{{ route('projects.restore',$project) }}" >
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-sm btn-info" >Restaurar</button>
                        </form>
                    @endcan
                    @can('forceDelete',$project)
                        <form method="POST" onsubmit="return confirm('Esta acción no se puede deshacer, ¿Estas seguro de eliminar el proyecto?')" action="{{ route('projects.forceDelete',$project) }}" >
                            @method('DELETE') @csrf
                            <button  type="submit" class="btn btn-sm btn-danger" >Eliminar permanente</button>
                        </form>
                    @endcan
                </li>
            @endforeach
        </ul>
    @endcan
</div>
@endsection

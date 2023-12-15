@extends('layout')
@section('title','Home')
@section('title','Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h1 class="display-4 text-primary" >Desarrollo Web</h1>
                <p class="lead text-secondary" >Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat explicabo saepe ipsa accusamus corrupti aperiam assumenda. Quidem, cumque dolorum voluptatibus officiis, corrupti possimus aliquam, corporis laboriosam laudantium aliquid in ea.</p>
                <a class="btn btn-block btn-lg btn-primary"
                    href="{{ route('contacto') }}"
                >
                    Contáctame
                </a>
                <a class="btn btn-block btn-lg btn-outline-primary"
                    href="{{ route('project.index') }}"
                >
                    Portafolio
                </a>
            </div>
            <div class="col-12 col-lg-6">
                <img src="/img/home.svg" class="img-fluid mb-4" alt="Desarrollo Web" />
            </div>
                {{-- @auth
                    {{ auth()->user()->name}}
                @endauth --}}
        </div>
    </div>
@endsection
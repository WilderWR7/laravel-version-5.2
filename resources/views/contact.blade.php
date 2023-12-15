@extends('layout')
@section('title','Contact')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
      <form class="bg-white shadown rounded py-3 px-4"  
      method="POST" action="{{ route('contacto') }}">
      @csrf
      <h1 class="display-4">{{__('Contact')}}</h1>
      <hr>
        <div class="form-group">
          <label for="nombre" >Nombre</label>
            <input id="nombre" class="form-control bg-light shadown-sm @error('nombre') is-invalid @enderror"
              value="{{@old('nombre')}}" name="nombre" placeholder="Nombre..."
            />
            @error('nombre')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="form-group">
          <label for="email" >Email</label>
          <input  id="email"  value="{{@old('email')}}" name="email" placeholder="Email..." class="form-control bg-light shadown-sm @error('email') is-invalid @enderror" />
          @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="form-group">
          <label for="asunto" >Asunto</label>
  
          <input id="asunto" name="asunto" placeholder="Asunto...." class="form-control bg-light shadown-sm @error('asunto') is-invalid @enderror" value="{{old('asunto')}}"/>
          @error('asunto')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="mensaje">Mensaje</label>
          <textarea id="mensaje"name="mensaje" placeholder="Mensaje..." class="form-control bg-light shadown-sm @error('mensaje') is-invalid @enderror">{{ @old('mensaje') }}</textarea>
          @error('mensaje')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
          <br>
          <div class="d-grid gap-2">
            <button class="btn btn-primary btn-lg btn-block">Enviar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

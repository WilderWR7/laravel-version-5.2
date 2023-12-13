@extends('layout')
@section('title','Contact')
@section('content')
 <h1>{{__('Contact')}}</h1>
 <form method="POST" action="{{ route('contacto') }}">
   @csrf
    <input value="{{@old('nombre')}}" name="nombre" placeholder="Nombre..." /><br>
    {!! $errors->first('nombre','<small>:message</small><br>') !!}

    <input  value="{{@old('email')}}" name="email" placeholder="Email..." /><br>
    {!! $errors->first('email','<small>:message</small><br>') !!}

    <input name="asunto" placeholder="Asunto...."  value="{{old('asunto')}}"/><br>
    {!! $errors-> first('asunto','<small>:message</small><br>') !!}
    <textarea name="mensaje" placeholder="Mensaje..."></textarea><br>
    {!! $errors-> first('mensaje','<small>:message</small><br>') !!}
    <button>Enviar</button>
 </form>
@endsection

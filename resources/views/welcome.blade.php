@extends('layout')
@section('title','Home')
@section('title','Home')

@section('content')
    <h1>Welcome</h1>
    @auth
        {{ auth()->user()->name}}
    @endauth
@endsection
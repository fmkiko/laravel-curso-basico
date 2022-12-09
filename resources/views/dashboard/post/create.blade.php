@extends('dashboard.layout')

@section('content')


    <h1>Crear Post </h1>
    @include('dashboard.fragments._errors-form')
    <form action="{{ route('post.store') }}" method="POST">
       @include('dashboard.fragments._formulario')
    </form>

@endsection
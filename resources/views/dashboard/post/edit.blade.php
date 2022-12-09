@extends('dashboard.layout')

@section('content')


    <h1>Actualiar Post : {{ $post->title }}</h1>
    @include('dashboard.fragments._errors-form')
    <form action="{{ route('post.update', $post->id ) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @include('dashboard.fragments._formulario', [ 'task' => 'edit'] )

    </form>

@endsection
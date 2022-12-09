@extends('dashboard.layout')

@section('content')
<h2>Description:</h2>
<p>{{$post->description}}</p>
<h2>Content:</h2>
<p>{{$post->content}}</p>
<hr>
<h2>Posteado : {{ $post->posted }}</h2>
<h2>Caregory: {{ $post->getCategory->title }} </h2>

@endsection
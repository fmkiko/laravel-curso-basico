
@extends('dashboard.layout')
@section('content')

    <a href="{{route('post.create')}}">Crear</a>
    <table>
        <thead>
        <tr>
            <th>Títitulo</th>
            <th>Categoria</th>
            <th>Posteado</th>
            <th>Acciones</th>
        </tr>
        </thead>
    
        <tbody>
            @foreach($posts as $p)
            <tr>
                <td>
                    {{$p->title}}
                </td>
                <td>
                    {{$p->getCategory->title}}
                </td>
                <td>
                    {{$p->posted}}
                </td>
                <td>

                    <a href="{{ route('post.show', $p )}}">Ver</a>
                    <a href="{{ route('post.edit', $p )}}">Edit</a>
                
                    <form action="{{ route('post.destroy', $p )}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit">Eliminar</button>
                    </form>
                  
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}

@endsection
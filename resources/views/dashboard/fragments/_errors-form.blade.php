

   
    @if($errors->any())
        <h1>Errores en el formularion</h1>
        @foreach($errors->all() as $e)
            <div class="error">
                {{$e}}
            </div>
        @endforeach
    @endif
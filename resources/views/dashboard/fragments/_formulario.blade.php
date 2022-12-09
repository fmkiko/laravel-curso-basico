
 @csrf 
        <label for="">Titulo</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}">

        <label for="">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $post->slug) }}">

        <label for="">Categoria:</label>
        <select name="category_id"  >
            <option value="">Categoria</option>
            @foreach ( $categories as $title => $id )
                <option value="{{$id}}" {{ old('category_id', $post->category_id) == $id ? 'selected' : '' }}    
                >{{$title}}</option>
            @endforeach
        </select>

        <label for="">Posteado:</label>
        <select name="posted" >
            <option value="not" {{ old('posted', $post->posted )== 'not' ? 'selected' : ''}}>No</option>
            <option value="yes" {{ old('posted', $post->posted )== 'yes' ? 'selected' : ''}}>Si</option>
          
        </select>

        <label for="">Content</label>
        <textarea type="text" name="content">{{ old('content', $post->content )}}</textarea>

        <label for="">Description</label>
        <textarea type="text" name="description">{{ old('description', $post->description )}}</textarea>
        @if(isset($task))
            <label for="">Image</label>
            <input type="file" name="image" >
        @endif
        <button type="submit">Enviar</button>
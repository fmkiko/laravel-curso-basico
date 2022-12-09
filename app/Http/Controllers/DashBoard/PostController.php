<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Post::paginate(2);//Post::get();// sin paginar
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::pluck('id', 'title');
        //dd($categories);
        return view('dashboard.post.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
      //$validated = $request->validate(StoreRequest::myRules());
      //dd($validated);
      // dd($request->all());
      // com facade/Validator
      //$validated =  Validator::make($request->all(), StoreRequest::myRules());
      //dd($validated->errors());
   
      $data = array_merge( $request->validated(), ['image' => 'http:image']);/// Podemos usar ->validated() o ->all()
      //dd($data);
      Post::create($data); // Como el created necesita un array le pasamos el all();
      //echo "save data";
      return to_route("post.index")->with('status', 'Registro creado.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $category = Category::find($post->category_id);
        $titleCategory = $category->title;
       
        return view("dashboard.post.ver", compact("post", "titleCategory"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        
        $categories = Category::pluck('id', 'title');
        return view('dashboard.post.edit', compact('categories', 'post' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Post $post)
    {
       $data = $request->validated();
       //echo $request->title;
       //echo $post->title;
      // dd($request->validated());
      if( $data['image'] ){
        //dd($request->image->getClientOriginalName());//$request->image->hashName()
        $fileName = time().".".$data['image']->extension();
        // mover la iamge a un disco 
        $request->validated()['image']->move(public_path("image"), $fileName);
      }
       
       $data['image'] = $fileName;
      
       $post->update($data);
       //$request->session()->flash("status", "Registro guardado."); 
       return to_route("post.index")->with("status", "Registro guardado.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("post.index")->with('status','Registro eliminado.');
    }
}

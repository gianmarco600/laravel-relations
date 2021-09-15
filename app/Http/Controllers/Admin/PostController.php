<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validazione dei dati

        $request->validate([
            'title' => 'required|max:60',
            'description' => 'required'
        ]);




        $newPost = $request->all();
        $new_Post = new Post();
        
        $slug = Str::slug($newPost['title'], '-');
        $slug_base = $slug;
        $slug_alredy_exist = post::where('slug', $slug)->first();
        $counter = 1;
        while($slug_alredy_exist){
            $slug = $slug_base . '-' . $counter;
            $slug_alredy_exist = post::where('slug', $slug)->first();
                
            $counter++;
        }
        $new_Post->slug = $slug;
        

        
        $new_Post->fill($newPost);
        $new_Post->save();

        return redirect()->route('admin.posts.index')->with('creato' , 'Hai creato l\' elemento id #' . $new_Post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        $post = Post::where('slug', $slug)->first();
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:60',
            'description' => 'required'
        ]);
        $editPost = $request->all();

        // controllo se il titolo e' stato modificato, altrimenti non cambio lo slug,
        // se lo slug nuovo glia esiste creo un contatore da aggiungere alla fine dello slug
       if($editPost['title' != $post->title]){
            $slug = Str::slug($editPost['title'], '-');
            $slug_base = $slug;
            $slug_alredy_exist = post::where('slug', $slug)->first();
            $counter = 1;
            while($slug_alredy_exist){
                $slug = $slug_base . '-' . $counter;
                $slug_alredy_exist = post::where('slug', $slug)->first();
                
                $counter++;
                
            }
            $editPost['slug'] = $slug;

        }
       $post->update($editPost);

       return redirect()->route('admin.posts.index')->with('modifica','Hai modificato l\'elemento #' . $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        
        $post->delete();

        return redirect()->route('admin.posts.index')->with('cancella','Hai cancellato l\'elemento #' . $post->id);
    }
}

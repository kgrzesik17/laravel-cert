<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $posts = Post::all();
        // $posts = Post::latest()->get();  // latest on top

        // $posts = Post::orderBy('id', 'asc')->get();  // oldest on top
        $posts = Post::latestPost();

        return view('posts.index', compact('posts'));
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    public function store(CreatePostRequest $request)
    {
        // // probably an old version, doesn't work for me
        // $this->validate($request, [
        //     'title'=>'required|max:50',  // these are VALIDATION RULES
        //     'content'=>'required'
        // ]);

        // $validated = $request->validate([  // these are VALIDATION RULES
        //     'title' => 'required|max:16',
        // ]);

        // return $request->all();

        Post::create($request->all()); 

        return redirect('/posts');



        // $input = $request->all();

        // $input['title'] = $request->title;
        
        // Post::create($request->all()); 

        // $post = new Post();

        // $post->title = $request->title;

        // $post->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        // $post = Post::findOrFail($id);
        // $post->delete();

        $post = Post::whereId($id)->delete();
    
        return redirect('/posts');
    }

    public function contact() {
        // $people = ['Edwin', 'Jose', 'James', 'Peter', 'Maria'];

        $people = ['kacper'];

        return view('contact', compact('people'));
    }

    public function show_post($id, $name) {
        // return view('post')->with('id',$id);

        return view('post', compact('id', 'name'));
    }
}

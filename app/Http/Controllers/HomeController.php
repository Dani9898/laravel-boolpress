<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use App\Tag;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function createPost() {

        $categories = Category::all();
        $tags = Tag::all();

        return view('pages.create-post', compact('categories', 'tags'));
    }

    public function storePost(Request $request) {

        $data = $request -> validate([
        'titolo' => 'required|string|max:255',
        'sottotitolo' => 'required|string|max:255',
        'contenuto' => 'required|string',
        'data' => 'required|date'
        ]);

        $data['autore'] = Auth::user() -> name;
        

        $post = Post::make($data);

        $category = Category::findOrFail($request -> get('category'));
        $post -> category() -> associate($category);
        $post -> save();

        $tags = Tag::findOrFail($request -> get('tags'));
        $post -> tags() -> attach($tags);
        $post -> save();


        return redirect() -> route('home');
    }

    public function editPost($id) {

        $categories = Category::all();
        $tags = Tag::all(); 

        $post = Post::findOrFail($id);

        return view('pages.edit-post', compact('categories', 'tags', 'post'));
    }

    public function updatePost(Request $request, $id) {

        $data = $request -> validate([
            'titolo' => 'required|string|max:255',
            'sottotitolo' => 'required|string|max:255',
            'contenuto' => 'required|string',
            'data' => 'required|date'
        ]);

        $data['autore'] = Auth::user() -> name;

        $post = Post::findOrFail($id);
        $post -> update($data);

        $category = Category::findOrFail($request -> get('category'));
        $post -> category() -> associate($category);
        $post -> save();

        $tags=[];
        // VERS 1
        if ($request -> has('tags'))
            $tags= Tag::findOrFail($request -> get('tags'));

        // VERS 2
        // try {
        //     $tags = Tag::findOrFail($request -> get('tags'));
            
        // } catch (\Exception $e) {}

        $post -> tags() -> sync($tags);  
        $post -> save();
        
        return redirect() -> route('home');



       
    }
}

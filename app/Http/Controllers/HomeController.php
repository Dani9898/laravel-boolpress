<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;


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

        return view('pages.create-post', compact('categories'));
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


        return redirect() -> route('home');
    }
}

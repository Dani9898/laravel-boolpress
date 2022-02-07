<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;


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
        return view('pages.create-post');
    }

    public function storePost(Request $request) {

        $data = $request -> validate([
        'titolo' => 'required|string|max:255',
        'sottotitolo' => 'required|string|max:255',
        'contenuto' => 'required|string',
        'data' => 'required|date'
        ]);

        $data['autore'] = Auth::user() -> name;
        

        $post = Post::create($data);
        return redirect() -> route('home');
    }
}

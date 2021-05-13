<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\City;
use App\Models\Post_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $posts = Post::all();
        //dd($posts);
        return view('result',[
            'posts' =>$posts
        ]);
    }

    public function create(Request $request)
    {
        $post = new Post();
        $titile = $request->input('titile');
        $cities = City::all()->pluck('name', 'id');
        $categories = config('category.caterories');
        $id = Auth::id();
  
        return view('new', [
             'post' =>$post,
             'titile' =>$titile,
             'cities' => $cities,
             'categories' => $categories, 
             'id'=>$id,
             ]);
    }
    public function store(Request $request)
    {
        $post = new Post();
        $post->user_id = auth()->id();
        $post->city_id = request('city_id');
        $post->category_id = request('category_id');
        $post->status_id = 1;
        $post->titile = request('titile');
        $post->address = request('address');
        
        $post->save();
        return redirect()->route('city.list');
    }
}

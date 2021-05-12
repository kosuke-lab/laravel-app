<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\City;
use App\Models\Post_image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::all();
        //dd($posts);
        return view('result',[
            'posts' =>$posts
        ]);
    }

    public function create()
    {
        $cities = City::all()->pluck('name', 'id');
        $categories = config('category.caterories');
        return view('new', [
             'cities' => $cities,
             'categories' => $categories, 
             ]);
    }
    public function store(Request $request)
    {
        $post = new Post();
        $post->titile = request('titile');
        $post->category_id = request('category_id');
        $post->titile = request('city_id');
        $post->user_id =user()->id;
        $post->save();
        return redirect()->route('city.list');
    }
}

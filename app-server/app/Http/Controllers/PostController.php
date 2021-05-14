<?php

namespace App\Http\Controllers;

use Storage;
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
   
        $cities = City::all()->pluck('name', 'id');
        $categories = config('category.caterories');
  
  
        return view('new', [
             'cities' => $cities,
             'categories' => $categories, 
             ]);
    }
    public function store(Request $request)
    {
           

            $post_id = Post::create([
            'titile' => $request->input('titile'),
            'city_id'=>$request->input('city_id'),
            'category_id'=>$request->input('category_id'),
            'status_id'=>1,
            'address'=>$request->input('address'),
            'user_id'=> auth()->id(),
            ]);

           

            //$form = $request->file('file_path');
            //dd($form);

            $image = $request->file('file_path');
            $path = Storage::disk('minio')->put('/', $image, 'public');
            $image->path = Storage::disk('minio')->url($path);;

            
            $post_image = Post_image::create([
                //'file_name' => $request->file('file_path')->getClientOriginalName(),
            ]);

       

        
        return redirect()->route('city.list');
    }
}

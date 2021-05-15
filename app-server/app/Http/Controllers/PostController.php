<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\City;
use App\Models\Post_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index($city_id ,$category_id)
    {

        //$posts = Post::all();
        //$categories = config('category.caterories');
        //dd($category_id);

        $results = Post::inRandomOrder()->where('city_id', $city_id)->where('category_id', $category_id)->first();
        //dd($results);
        return view('result',[
            'results' =>$results,
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
            $post_id = Post::create([
            'titile' => $request->input('titile'),
            'city_id'=>$request->input('city_id'),
            'category_id'=>$request->input('category_id'),
            'status_id'=>1,
            'address'=>$request->input('address'),
            'user_id'=> Auth()->id(),
            ])->id;

            $image = $request->file('file_path');
            $path = Storage::disk('minio')->put('/', $image, 'public');
            //dd('image/'.$path);
            // $image_path = Storage::disk('minio')->url($path);

             Post_image::create([
                'file_name' => $request->file('file_path')->getClientOriginalName(),
                'file_path'=> 'image/'.$path,
                 'post_id' =>  $post_id,
            ]);

        return redirect()->route('city.list');
    }
}

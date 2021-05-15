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
    
    public function index()
    {
    $cities = City::all();
    return view('index',['cities' =>$cities]);
    }

    public function category(Request $request, $id)
    {
        $city_name = City::find($id)->name;
        $categories = config('category.caterories');
        $request->session()->put('city_id', $id);
        return view('category',[
            'city_name' => $city_name,
            'categories' =>$categories,
            'id' =>$id,
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
            
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file_path = Storage::disk('minio')->put('/', $file, 'public');
            
            //dd('image/'.$path);
            // $image_path = Storage::disk('minio')->url($path);

             Post_image::create([
                'file_name' => $file_name,
                'file_path'=> 'image/'.$file_path,
                 'post_id' =>  $post_id,
            ]);
        return redirect()->route('city.list');
    }

    public function result(Request $request,$id,$category_id)
    {
        
        $city_id = $request->session()->get('city_id');
        dd($category_id);
        $results = Post::where('city_id', $city_id)->where('category_id', $category_id)->inRandomOrder()->first();
        return view('result',[
            'results' =>$results,
        ]);
    }
}

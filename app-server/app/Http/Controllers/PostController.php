<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\City;
use App\Models\Post_image;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','category','add']);
    }
    public function city_add()
    {
        $cities = City::all();
        return view('city_add',['cities' =>$cities]
    );
}

    public function city_store(Request $request)
    {
        //$city_name = $request->input('text');
        //dd($city_name);
        
        City::create([
            'name'=>$request->input('text')
        ]);
        return redirect()->route('city.list');
    }
    
    /**
     * 
     */
    public function index()
    {
    $cities = City::all();
    return view('index',['cities' =>$cities]);
    }

    public function category(Request $request, $id)
    {
        $city_name = City::find($id)->name;
        $categories = config('category.caterories');

        //セッションcity_idを保存
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
    public function store(CreatePostRequest $request)
    {
        $post_id = Post::create([
            'titile' => $request->input('titile'),
            'city_id'=>$request->input('city_id'),
            'category_id'=>$request->input('category_id'),
            'status_id'=>1,
            'address'=>$request->input('address'),
            'user_id'=> Auth()->id(),
            ])->id;
            
            //フォームから画像情報受け取り
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();

            //minioへ画像アップロード
            $file_path = Storage::disk('minio')->put('/', $file, 'public');
            
             Post_image::create([
                'file_name' => $file_name,
                'file_path'=> 'image/'.$file_path,
                 'post_id' =>  $post_id,
            ]);
        return redirect()->route('city.list');
    }

    public function result(Request $request,$id,$category_id)
    {
        //セッションcity＿idの受け取り
        $city_id = $request->session()->get('city_id');

        //ランダムでcity_idとcategory_idが一致するデータ呼び出し
        $results = Post::where('city_id', $city_id)->where('category_id', $category_id)->inRandomOrder()->first();
        return view('result',[
            'results' =>$results,
        ]);
    }
}

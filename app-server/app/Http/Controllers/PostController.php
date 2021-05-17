<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Gate;
use App\Models\User;
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
        $this->middleware('auth')->except(['index']);
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

    public function edit($post_id)
    {
        $post = Post::find($post_id);
        $cities = City::all()->pluck('name', 'id');

        $categories = config('category.caterories');
        return view('edit', [
            'post' =>$post,
             'cities' => $cities,
             'categories' => $categories, 
             ]);
    }

    public function update(CreatePostRequest $request, $post_id)
    {

        $post = Post::find($post_id);
        $post ->fill(['titile' => $request->input('titile')]);
        $post ->fill(['city_id' => $request->input('city_id')]);
        $post ->fill(['category_id' => $request->input('category_id')]);
        $post ->fill(['address' => $request->input('address')]);

        $post->save();

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

    public function getuser($user_id)
    {
        $user_id =Auth()->id();
        $posts = Post::where('user_id',$user_id)->get();
        //dd($posts);
        return view('mypage',[
            'user_id' => $user_id,
            'posts' => $posts,
          
        ]);
    }

    public function admin()
    {

        if(Gate::authorize('admin')){
        
        $users = User::all();
        }else{
            dd('ユーザ一覧にアクセスが許可されていないユーザです。');
        };
        return view ('admin',[
            'users' =>$users,
    ]);
    }
}

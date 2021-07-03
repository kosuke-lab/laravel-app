<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Gate;
use App\Models\User;
use App\Models\Post;
use App\Models\City;
use App\Models\Like;
use App\Models\Post_image;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use Illuminate\Http\File;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','result','about']);
    }
    
    /**
     * トップページで市町村選択処理
     */
    public function index()
    {
    $cities_center = City::where('area', '都心')->get();
    $cities_subcenter = City::where('area', '副都心')->get();
    $cities_east = City::where('area', '東部')->get();
    $cities_west = City::where('area', '西部')->get();
    
    $categories = config('category.caterories');
    return view('index',[
        'cities_center' =>$cities_center,
        'categories' =>$categories,
        'cities_subcenter'=>$cities_subcenter,
        'cities_east'=>$cities_east,
        'cities_west'=>$cities_west,
        ]);
    }

    /**
     * カテゴリー選択画面
     */

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

     /**
     *新規投稿画面
     */
        
    public function create()
    {
        $cities = City::all()->pluck('name', 'id');
        $categories = config('category.caterories');
        return view('new', [
             'cities' => $cities,
             'categories' => $categories, 
             ]);
    }

     /**
     *投稿編集画面
     */
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

    /**
     *投稿編集の情報受け取り
     */

    public function update(CreatePostRequest $request, $post_id)
    {

        $post = Post::find($post_id);
        $post ->fill(['title' => $request->input('title')]);
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

    /**
     *新規投稿情報受け取り
     */

    public function store(CreatePostRequest  $request)
    {

        $post_id = Post::create([
            'title' => $request->input('title'),
            'city_id'=>$request->input('city_id'),
            'category_id'=>$request->input('category_id'),
            'status_id'=>1,
            'address'=>$request->input('address'),
            'user_id'=> Auth()->id(),
            ])->id;

            //フォームから画像情報受け取り　画像ありの時の処理
            $file = $request->file('image');
            if (isset($file)) {
                $file_name = $file->getClientOriginalName();
    
                // $image = InterventionImage::make($file)->resize(440, 300,function ($constraint) {
                //     $constraint->aspectRatio();
                // });
                
                // $save_path =  public_path('/images/'. $file_name );
    
                //minioへ画像アップロード
                //$file_path = Storage::disk('minio')->putFile('/', new File($save_path), 'public');

                //AWSへ画像アップロード
                

                //minioへ画像アップロード
                //$file_path = Storage::disk('minio')->put('/', $file, 'public');

             Post_image::create([
                'file_name' => $file_name,
                'file_path'=> 'image/'.$file->store('/', 's3'),
                 'post_id' =>  $post_id,
            ]);
        session()->flash('msg_success', '投稿が完了しました。管理者の承認をお待ちください');
        return redirect()->route('city.list');
    }else{
        //画像なしの時の処理、デフォルトの画像を表示させる

        Post_image::create([
            'file_name' => 'noimage',
            'file_path'=> 'image/noimage.png',
             'post_id' =>  $post_id,
        ]);
        session()->flash('msg_success', '投稿が完了しました。管理者の承認をお待ちください');
        return redirect()->route('city.list');
    }
}


     /**
     *ランダム結果
     */


    public function result(Request $request)
    {
        //セッションcity＿idの受け取り
        //$city_id = $request->session()->get('city_id');
        $datas = $request->input();
        
        // dd($datas);
        //ランダムでcity_idとcategory_idが一致するデータ呼び出し
        $results = Post::where('city_id', $datas['cityId'])->where('category_id', $datas['category_id'])->where('status_id', 2)->inRandomOrder()->first();

        //Vue側でuser_id取得
        $userAuth = Auth::id();

        //ランダム結果をいいねしてる取得
        $defaultLiked = $results->like->where('user_id',$userAuth)->first();

        //ランダム結果をいいねされてる数を取得
        $defaultCount = count($results->like);

            if(!empty($defaultLiked) ==0){
                $defaultLiked == false;
            }else{
                $defaultLiked == true;
            }
        
        return view('result',[
            'results' =>$results,
            'userAuth' => $userAuth,
            'defaultLiked' =>$defaultLiked,
            'defaultCount' =>$defaultCount,
        ]);
    }

    /**
     *マイページ作成
     */

    public function getuser($user_id)
    {
        $user_id =Auth()->id();
        $posts = Post::where('user_id',$user_id)->get();
        $statuses = config('status.statuses');

        //ユーザーお気に入り投稿取得
        $favorites = Auth::user()->posts()->get();
        //dd($posts);
        return view('mypage',[
            'user_id' => $user_id,
            'posts' => $posts,
            'favorites' => $favorites,
            'statuses' => $statuses,
        ]);
    }


    /**
     *管理者ページ作成
     */
    public function admin(Request $request)
    {
        $statuses = config('status.statuses');

        if(Gate::allows('admin')){
        $posts =Post::all();
        }else{
            return redirect('/');
        }

         if ($request->filled('keyword')) {
             $keyword = $request->input('keyword');
             $posts = Post::where('title', 'like', '%' . $keyword . '%')->get();
            }else{
            $posts = Post::all();
         }

        return view ('admin',[
            'posts' =>$posts,
            'statuses'=>$statuses,
    ]);
    }

    /**
     *管理者ステータス変更
     */
    public function admin_edit($post_id)
    {
        if(Gate::allows('admin')){
        $post =Post::find($post_id);
        $cities = City::all()->pluck('name', 'id');
        $categories = config('category.caterories');
        $statuses = config('status.statuses');

    }else{
         return redirect('/');
    };
        return view('admin_edit',[
            'post' => $post,
            'cities' => $cities,
            'categories' => $categories,
            'statuses'=>$statuses,
        ]);
    }

    public function admin_update(CreatePostRequest $request, $post_id)
    {
        $post = Post::find($post_id);
        $post ->fill(['title' => $request->input('title')]);
        $post ->fill(['city_id' => $request->input('city_id')]);
        $post ->fill(['category_id' => $request->input('category_id')]);
        $post ->fill(['address' => $request->input('address')]);
        $post ->fill(['status_id' => $request->input('status_id')]);
        $post->save();

        return redirect()->route('admin');
    }

public function about()
 {
      return view('about',[

      ]);
 }
}



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

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    
    /**
     * トップページで市町村選択処理
     */
    public function index()
    {
    $cities = City::get();
    
    $categories = config('category.caterories');
    return view('index',[
        'cities' =>$cities,
        'categories' =>$categories,
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

    /**
     *新規投稿情報受け取り
     */

    public function store(Request $request)
    {
    try{
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
        session()->flash('msg_success', '投稿が完了しました。管理者の承認をお待ちください');
        return redirect()->route('city.list');
        }
        catch (\Exception $e) {
            session()->flash('msg_danger', '失敗しました。');
    

            return redirect()->route('post.new');
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
        
        dd($datas);
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
        //dd($posts);
        return view('mypage',[
            'user_id' => $user_id,
            'posts' => $posts,
          
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
             $posts = Post::where('titile', 'like', '%' . $keyword . '%')->get();
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
        $post ->fill(['titile' => $request->input('titile')]);
        $post ->fill(['city_id' => $request->input('city_id')]);
        $post ->fill(['category_id' => $request->input('category_id')]);
        $post ->fill(['address' => $request->input('address')]);
        $post ->fill(['status_id' => $request->input('status_id')]);
        $post->save();

        return redirect()->route('admin');
    }

    public function favorite(Post $post, Request $request,$post_id)
{
    $userAuth = Auth::id();

    $favorites = Auth::user()->posts()->get();
    

     return view('favorite',[
         'favorites' => $favorites,
     ]);
}
}



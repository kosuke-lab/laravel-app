<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Post;
use App\Models\Like;

class LikeController extends Controller
{
    public function like(Post $post, Request $request)
    {

      $like = Like::create([
          'post_id' => $post->id, 
          'user_id' => $request->user_id]);

        return response()->json([]);
    }

    public function unlike(Post $post, Request $request)
    {

      $unlike = Like::where('post_id',$post->id)->where('user_id', $request->user_id)->first();;
      $unlike->delete;
        return response()->json([]);
    }
}

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

      //$likeCount = count(Like::where('post_id', $post->id)->get());

        return response()->json([]);
    }
}

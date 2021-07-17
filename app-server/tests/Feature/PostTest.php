<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{

    use RefreshDatabase;

    //引数としてnullを渡した時、falseが返ってくること
    public function testIsLikedByNull()
    {
        $post = factory(Post::class)->create();

        $result = $post->isLikedBy(null);
         $this->assertFalse($result);

    }

    //いいねをしているケース
    public function testIsLikedByTheUser()
    {
        $post = factory(Post::class)->create();
        $user = factory(User::class)->create();

        //attachを使って中間テーブルにデータを入れる
        $post->likes()->attach($user);

        $result = $post->isLikedBy($user);

        $this->assertTrue($result);
    }

     //いいねをしていないケース
    public function testIsLikedByAnother()
    {
        $post = factory(Post::class)->create();
        $user = factory(User::class)->create();
        $another = factory(User::class)->create();
        $post->likes()->attach($another);

        $result = $post->isLikedBy($user);

        $this->assertFalse($result);
    }
}

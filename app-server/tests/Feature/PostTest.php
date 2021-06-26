<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Like;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{

    use RefreshDatabase;

    public function testIsLikedByNull()
    {
        $post = factory(Post::class)->create();

        $result = $post->isLikedBy(null);
         $this->assertFalse($result);

    }

    public function testIsLikedByTheUser()
    {
        $post = factory(Post::class)->create();
        $user = factory(User::class)->create();
        $post->user()->attach($user);

        $result = $post->isLikedBy($user);

        $this->assertTrue($result);
    }
}

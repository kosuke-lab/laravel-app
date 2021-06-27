<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     *トップページ表示テスト
    */

    // public function testIndex()
    // {
    //     $response = $this->get(route('city.list'));
        
    //      // レスポンスを検証
    //     $response->assertStatus(200)
    //         ->assertViewIs('index');
    // }

    /**
     *新規投稿未ログインのテスト
    */
    public function testGuestCreate()
    {
        $response = $this->get(route('post.new'));
        $response->assertRedirect(route('login'));
    }   


        /**
         *新規投稿済みログインのテスト
        */
    public function testAuthCreate()
    {
        // テストに必要なUserモデルを作成、role権限あり
        $user = factory(User::class)->create();

         // ログインして記事投稿画面にアクセスすることを実行
        $response = $this->actingAs($user)
            ->get(route('post.new'));
            
        // レスポンスを検証
        $response->assertStatus(200)
            ->assertViewIs('new');
    }
    
}

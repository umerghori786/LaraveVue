<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostCreateTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_product_page_load(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }
    public function test_post_is_saved_table()
    {
        $post = Post::create(['user_id'=>1,'title'=>'this is test title','content'=>'this is content','status'=>1]);

        $this->assertNotNull($post);
        $this->assertEquals(1, $post->user_id);
    }
}

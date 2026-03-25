<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Http\Middleware\VerifyCsrfToken;

class PostControllerTest extends TestCase
{   
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     */
    public function test_index_post_page(): void
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
    }
    public function test_create_post(): void
    {   
        $this->withoutMiddleware(VerifyCsrfToken::class);

        $post = $this->post(route('posts.store'),[

            'title' =>'this title comes from test post',
            'content' => 'this content comes from test post',
            'user_id' => 1,
            'status' => 1
        ]);


        $this->assertNotNull($post);
        $this->assertEquals(1, $post->user_id);
    }
}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Post;

class PostApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_post()
    {
        $post = factory(Post::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/posts', $post
        );

        $this->assertApiResponse($post);
    }

    /**
     * @test
     */
    public function test_read_post()
    {
        $post = factory(Post::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/posts/'.$post->id
        );

        $this->assertApiResponse($post->toArray());
    }

    /**
     * @test
     */
    public function test_update_post()
    {
        $post = factory(Post::class)->create();
        $editedPost = factory(Post::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/posts/'.$post->id,
            $editedPost
        );

        $this->assertApiResponse($editedPost);
    }

    /**
     * @test
     */
    public function test_delete_post()
    {
        $post = factory(Post::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/posts/'.$post->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/posts/'.$post->id
        );

        $this->response->assertStatus(404);
    }
}

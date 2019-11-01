<?php namespace Tests\Repositories;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PostRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PostRepository
     */
    protected $postRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->postRepo = \App::make(PostRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_post()
    {
        $post = factory(Post::class)->make()->toArray();

        $createdPost = $this->postRepo->create($post);

        $createdPost = $createdPost->toArray();
        $this->assertArrayHasKey('id', $createdPost);
        $this->assertNotNull($createdPost['id'], 'Created Post must have id specified');
        $this->assertNotNull(Post::find($createdPost['id']), 'Post with given id must be in DB');
        $this->assertModelData($post, $createdPost);
    }

    /**
     * @test read
     */
    public function test_read_post()
    {
        $post = factory(Post::class)->create();

        $dbPost = $this->postRepo->find($post->id);

        $dbPost = $dbPost->toArray();
        $this->assertModelData($post->toArray(), $dbPost);
    }

    /**
     * @test update
     */
    public function test_update_post()
    {
        $post = factory(Post::class)->create();
        $fakePost = factory(Post::class)->make()->toArray();

        $updatedPost = $this->postRepo->update($fakePost, $post->id);

        $this->assertModelData($fakePost, $updatedPost->toArray());
        $dbPost = $this->postRepo->find($post->id);
        $this->assertModelData($fakePost, $dbPost->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_post()
    {
        $post = factory(Post::class)->create();

        $resp = $this->postRepo->delete($post->id);

        $this->assertTrue($resp);
        $this->assertNull(Post::find($post->id), 'Post should not exist in DB');
    }
}

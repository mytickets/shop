<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Metatext;

class MetatextApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_metatext()
    {
        $metatext = factory(Metatext::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/metatexts', $metatext
        );

        $this->assertApiResponse($metatext);
    }

    /**
     * @test
     */
    public function test_read_metatext()
    {
        $metatext = factory(Metatext::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/metatexts/'.$metatext->id
        );

        $this->assertApiResponse($metatext->toArray());
    }

    /**
     * @test
     */
    public function test_update_metatext()
    {
        $metatext = factory(Metatext::class)->create();
        $editedMetatext = factory(Metatext::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/metatexts/'.$metatext->id,
            $editedMetatext
        );

        $this->assertApiResponse($editedMetatext);
    }

    /**
     * @test
     */
    public function test_delete_metatext()
    {
        $metatext = factory(Metatext::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/metatexts/'.$metatext->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/metatexts/'.$metatext->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Cat;

class CatApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cat()
    {
        $cat = factory(Cat::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cats', $cat
        );

        $this->assertApiResponse($cat);
    }

    /**
     * @test
     */
    public function test_read_cat()
    {
        $cat = factory(Cat::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/cats/'.$cat->id
        );

        $this->assertApiResponse($cat->toArray());
    }

    /**
     * @test
     */
    public function test_update_cat()
    {
        $cat = factory(Cat::class)->create();
        $editedCat = factory(Cat::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cats/'.$cat->id,
            $editedCat
        );

        $this->assertApiResponse($editedCat);
    }

    /**
     * @test
     */
    public function test_delete_cat()
    {
        $cat = factory(Cat::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cats/'.$cat->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cats/'.$cat->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\Repositories;

use App\Models\Metatext;
use App\Repositories\MetatextRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MetatextRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MetatextRepository
     */
    protected $metatextRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->metatextRepo = \App::make(MetatextRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_metatext()
    {
        $metatext = factory(Metatext::class)->make()->toArray();

        $createdMetatext = $this->metatextRepo->create($metatext);

        $createdMetatext = $createdMetatext->toArray();
        $this->assertArrayHasKey('id', $createdMetatext);
        $this->assertNotNull($createdMetatext['id'], 'Created Metatext must have id specified');
        $this->assertNotNull(Metatext::find($createdMetatext['id']), 'Metatext with given id must be in DB');
        $this->assertModelData($metatext, $createdMetatext);
    }

    /**
     * @test read
     */
    public function test_read_metatext()
    {
        $metatext = factory(Metatext::class)->create();

        $dbMetatext = $this->metatextRepo->find($metatext->id);

        $dbMetatext = $dbMetatext->toArray();
        $this->assertModelData($metatext->toArray(), $dbMetatext);
    }

    /**
     * @test update
     */
    public function test_update_metatext()
    {
        $metatext = factory(Metatext::class)->create();
        $fakeMetatext = factory(Metatext::class)->make()->toArray();

        $updatedMetatext = $this->metatextRepo->update($fakeMetatext, $metatext->id);

        $this->assertModelData($fakeMetatext, $updatedMetatext->toArray());
        $dbMetatext = $this->metatextRepo->find($metatext->id);
        $this->assertModelData($fakeMetatext, $dbMetatext->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_metatext()
    {
        $metatext = factory(Metatext::class)->create();

        $resp = $this->metatextRepo->delete($metatext->id);

        $this->assertTrue($resp);
        $this->assertNull(Metatext::find($metatext->id), 'Metatext should not exist in DB');
    }
}

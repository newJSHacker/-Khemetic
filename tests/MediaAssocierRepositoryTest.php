<?php

use App\Models\MediaAssocier;
use App\Repositories\MediaAssocierRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MediaAssocierRepositoryTest extends TestCase
{
    use MakeMediaAssocierTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MediaAssocierRepository
     */
    protected $mediaAssocierRepo;

    public function setUp()
    {
        parent::setUp();
        $this->mediaAssocierRepo = App::make(MediaAssocierRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMediaAssocier()
    {
        $mediaAssocier = $this->fakeMediaAssocierData();
        $createdMediaAssocier = $this->mediaAssocierRepo->create($mediaAssocier);
        $createdMediaAssocier = $createdMediaAssocier->toArray();
        $this->assertArrayHasKey('id', $createdMediaAssocier);
        $this->assertNotNull($createdMediaAssocier['id'], 'Created MediaAssocier must have id specified');
        $this->assertNotNull(MediaAssocier::find($createdMediaAssocier['id']), 'MediaAssocier with given id must be in DB');
        $this->assertModelData($mediaAssocier, $createdMediaAssocier);
    }

    /**
     * @test read
     */
    public function testReadMediaAssocier()
    {
        $mediaAssocier = $this->makeMediaAssocier();
        $dbMediaAssocier = $this->mediaAssocierRepo->find($mediaAssocier->id);
        $dbMediaAssocier = $dbMediaAssocier->toArray();
        $this->assertModelData($mediaAssocier->toArray(), $dbMediaAssocier);
    }

    /**
     * @test update
     */
    public function testUpdateMediaAssocier()
    {
        $mediaAssocier = $this->makeMediaAssocier();
        $fakeMediaAssocier = $this->fakeMediaAssocierData();
        $updatedMediaAssocier = $this->mediaAssocierRepo->update($fakeMediaAssocier, $mediaAssocier->id);
        $this->assertModelData($fakeMediaAssocier, $updatedMediaAssocier->toArray());
        $dbMediaAssocier = $this->mediaAssocierRepo->find($mediaAssocier->id);
        $this->assertModelData($fakeMediaAssocier, $dbMediaAssocier->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMediaAssocier()
    {
        $mediaAssocier = $this->makeMediaAssocier();
        $resp = $this->mediaAssocierRepo->delete($mediaAssocier->id);
        $this->assertTrue($resp);
        $this->assertNull(MediaAssocier::find($mediaAssocier->id), 'MediaAssocier should not exist in DB');
    }
}

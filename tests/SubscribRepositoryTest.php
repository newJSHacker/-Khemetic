<?php

use App\Models\Subscrib;
use App\Repositories\SubscribRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubscribRepositoryTest extends TestCase
{
    use MakeSubscribTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SubscribRepository
     */
    protected $subscribRepo;

    public function setUp()
    {
        parent::setUp();
        $this->subscribRepo = App::make(SubscribRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSubscrib()
    {
        $subscrib = $this->fakeSubscribData();
        $createdSubscrib = $this->subscribRepo->create($subscrib);
        $createdSubscrib = $createdSubscrib->toArray();
        $this->assertArrayHasKey('id', $createdSubscrib);
        $this->assertNotNull($createdSubscrib['id'], 'Created Subscrib must have id specified');
        $this->assertNotNull(Subscrib::find($createdSubscrib['id']), 'Subscrib with given id must be in DB');
        $this->assertModelData($subscrib, $createdSubscrib);
    }

    /**
     * @test read
     */
    public function testReadSubscrib()
    {
        $subscrib = $this->makeSubscrib();
        $dbSubscrib = $this->subscribRepo->find($subscrib->id);
        $dbSubscrib = $dbSubscrib->toArray();
        $this->assertModelData($subscrib->toArray(), $dbSubscrib);
    }

    /**
     * @test update
     */
    public function testUpdateSubscrib()
    {
        $subscrib = $this->makeSubscrib();
        $fakeSubscrib = $this->fakeSubscribData();
        $updatedSubscrib = $this->subscribRepo->update($fakeSubscrib, $subscrib->id);
        $this->assertModelData($fakeSubscrib, $updatedSubscrib->toArray());
        $dbSubscrib = $this->subscribRepo->find($subscrib->id);
        $this->assertModelData($fakeSubscrib, $dbSubscrib->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSubscrib()
    {
        $subscrib = $this->makeSubscrib();
        $resp = $this->subscribRepo->delete($subscrib->id);
        $this->assertTrue($resp);
        $this->assertNull(Subscrib::find($subscrib->id), 'Subscrib should not exist in DB');
    }
}

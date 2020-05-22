<?php

use App\Models\TestSite;
use App\Repositories\TestSiteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestSiteRepositoryTest extends TestCase
{
    use MakeTestSiteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TestSiteRepository
     */
    protected $testSiteRepo;

    public function setUp()
    {
        parent::setUp();
        $this->testSiteRepo = App::make(TestSiteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTestSite()
    {
        $testSite = $this->fakeTestSiteData();
        $createdTestSite = $this->testSiteRepo->create($testSite);
        $createdTestSite = $createdTestSite->toArray();
        $this->assertArrayHasKey('id', $createdTestSite);
        $this->assertNotNull($createdTestSite['id'], 'Created TestSite must have id specified');
        $this->assertNotNull(TestSite::find($createdTestSite['id']), 'TestSite with given id must be in DB');
        $this->assertModelData($testSite, $createdTestSite);
    }

    /**
     * @test read
     */
    public function testReadTestSite()
    {
        $testSite = $this->makeTestSite();
        $dbTestSite = $this->testSiteRepo->find($testSite->id);
        $dbTestSite = $dbTestSite->toArray();
        $this->assertModelData($testSite->toArray(), $dbTestSite);
    }

    /**
     * @test update
     */
    public function testUpdateTestSite()
    {
        $testSite = $this->makeTestSite();
        $fakeTestSite = $this->fakeTestSiteData();
        $updatedTestSite = $this->testSiteRepo->update($fakeTestSite, $testSite->id);
        $this->assertModelData($fakeTestSite, $updatedTestSite->toArray());
        $dbTestSite = $this->testSiteRepo->find($testSite->id);
        $this->assertModelData($fakeTestSite, $dbTestSite->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTestSite()
    {
        $testSite = $this->makeTestSite();
        $resp = $this->testSiteRepo->delete($testSite->id);
        $this->assertTrue($resp);
        $this->assertNull(TestSite::find($testSite->id), 'TestSite should not exist in DB');
    }
}

<?php

use App\Models\TexteSite;
use App\Repositories\TexteSiteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TexteSiteRepositoryTest extends TestCase
{
    use MakeTexteSiteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TexteSiteRepository
     */
    protected $texteSiteRepo;

    public function setUp()
    {
        parent::setUp();
        $this->texteSiteRepo = App::make(TexteSiteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTexteSite()
    {
        $texteSite = $this->fakeTexteSiteData();
        $createdTexteSite = $this->texteSiteRepo->create($texteSite);
        $createdTexteSite = $createdTexteSite->toArray();
        $this->assertArrayHasKey('id', $createdTexteSite);
        $this->assertNotNull($createdTexteSite['id'], 'Created TexteSite must have id specified');
        $this->assertNotNull(TexteSite::find($createdTexteSite['id']), 'TexteSite with given id must be in DB');
        $this->assertModelData($texteSite, $createdTexteSite);
    }

    /**
     * @test read
     */
    public function testReadTexteSite()
    {
        $texteSite = $this->makeTexteSite();
        $dbTexteSite = $this->texteSiteRepo->find($texteSite->id);
        $dbTexteSite = $dbTexteSite->toArray();
        $this->assertModelData($texteSite->toArray(), $dbTexteSite);
    }

    /**
     * @test update
     */
    public function testUpdateTexteSite()
    {
        $texteSite = $this->makeTexteSite();
        $fakeTexteSite = $this->fakeTexteSiteData();
        $updatedTexteSite = $this->texteSiteRepo->update($fakeTexteSite, $texteSite->id);
        $this->assertModelData($fakeTexteSite, $updatedTexteSite->toArray());
        $dbTexteSite = $this->texteSiteRepo->find($texteSite->id);
        $this->assertModelData($fakeTexteSite, $dbTexteSite->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTexteSite()
    {
        $texteSite = $this->makeTexteSite();
        $resp = $this->texteSiteRepo->delete($texteSite->id);
        $this->assertTrue($resp);
        $this->assertNull(TexteSite::find($texteSite->id), 'TexteSite should not exist in DB');
    }
}

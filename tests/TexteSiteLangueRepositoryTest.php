<?php

use App\Models\TexteSiteLangue;
use App\Repositories\TexteSiteLangueRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TexteSiteLangueRepositoryTest extends TestCase
{
    use MakeTexteSiteLangueTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TexteSiteLangueRepository
     */
    protected $texteSiteLangueRepo;

    public function setUp()
    {
        parent::setUp();
        $this->texteSiteLangueRepo = App::make(TexteSiteLangueRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTexteSiteLangue()
    {
        $texteSiteLangue = $this->fakeTexteSiteLangueData();
        $createdTexteSiteLangue = $this->texteSiteLangueRepo->create($texteSiteLangue);
        $createdTexteSiteLangue = $createdTexteSiteLangue->toArray();
        $this->assertArrayHasKey('id', $createdTexteSiteLangue);
        $this->assertNotNull($createdTexteSiteLangue['id'], 'Created TexteSiteLangue must have id specified');
        $this->assertNotNull(TexteSiteLangue::find($createdTexteSiteLangue['id']), 'TexteSiteLangue with given id must be in DB');
        $this->assertModelData($texteSiteLangue, $createdTexteSiteLangue);
    }

    /**
     * @test read
     */
    public function testReadTexteSiteLangue()
    {
        $texteSiteLangue = $this->makeTexteSiteLangue();
        $dbTexteSiteLangue = $this->texteSiteLangueRepo->find($texteSiteLangue->id);
        $dbTexteSiteLangue = $dbTexteSiteLangue->toArray();
        $this->assertModelData($texteSiteLangue->toArray(), $dbTexteSiteLangue);
    }

    /**
     * @test update
     */
    public function testUpdateTexteSiteLangue()
    {
        $texteSiteLangue = $this->makeTexteSiteLangue();
        $fakeTexteSiteLangue = $this->fakeTexteSiteLangueData();
        $updatedTexteSiteLangue = $this->texteSiteLangueRepo->update($fakeTexteSiteLangue, $texteSiteLangue->id);
        $this->assertModelData($fakeTexteSiteLangue, $updatedTexteSiteLangue->toArray());
        $dbTexteSiteLangue = $this->texteSiteLangueRepo->find($texteSiteLangue->id);
        $this->assertModelData($fakeTexteSiteLangue, $dbTexteSiteLangue->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTexteSiteLangue()
    {
        $texteSiteLangue = $this->makeTexteSiteLangue();
        $resp = $this->texteSiteLangueRepo->delete($texteSiteLangue->id);
        $this->assertTrue($resp);
        $this->assertNull(TexteSiteLangue::find($texteSiteLangue->id), 'TexteSiteLangue should not exist in DB');
    }
}

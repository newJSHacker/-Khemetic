<?php

use App\Models\Social;
use App\Repositories\SocialRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SocialRepositoryTest extends TestCase
{
    use MakeSocialTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SocialRepository
     */
    protected $socialRepo;

    public function setUp()
    {
        parent::setUp();
        $this->socialRepo = App::make(SocialRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSocial()
    {
        $social = $this->fakeSocialData();
        $createdSocial = $this->socialRepo->create($social);
        $createdSocial = $createdSocial->toArray();
        $this->assertArrayHasKey('id', $createdSocial);
        $this->assertNotNull($createdSocial['id'], 'Created Social must have id specified');
        $this->assertNotNull(Social::find($createdSocial['id']), 'Social with given id must be in DB');
        $this->assertModelData($social, $createdSocial);
    }

    /**
     * @test read
     */
    public function testReadSocial()
    {
        $social = $this->makeSocial();
        $dbSocial = $this->socialRepo->find($social->id);
        $dbSocial = $dbSocial->toArray();
        $this->assertModelData($social->toArray(), $dbSocial);
    }

    /**
     * @test update
     */
    public function testUpdateSocial()
    {
        $social = $this->makeSocial();
        $fakeSocial = $this->fakeSocialData();
        $updatedSocial = $this->socialRepo->update($fakeSocial, $social->id);
        $this->assertModelData($fakeSocial, $updatedSocial->toArray());
        $dbSocial = $this->socialRepo->find($social->id);
        $this->assertModelData($fakeSocial, $dbSocial->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSocial()
    {
        $social = $this->makeSocial();
        $resp = $this->socialRepo->delete($social->id);
        $this->assertTrue($resp);
        $this->assertNull(Social::find($social->id), 'Social should not exist in DB');
    }
}

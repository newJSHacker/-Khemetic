<?php

use App\Models\Background;
use App\Repositories\BackgroundRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BackgroundRepositoryTest extends TestCase
{
    use MakeBackgroundTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var BackgroundRepository
     */
    protected $backgroundRepo;

    public function setUp()
    {
        parent::setUp();
        $this->backgroundRepo = App::make(BackgroundRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateBackground()
    {
        $background = $this->fakeBackgroundData();
        $createdBackground = $this->backgroundRepo->create($background);
        $createdBackground = $createdBackground->toArray();
        $this->assertArrayHasKey('id', $createdBackground);
        $this->assertNotNull($createdBackground['id'], 'Created Background must have id specified');
        $this->assertNotNull(Background::find($createdBackground['id']), 'Background with given id must be in DB');
        $this->assertModelData($background, $createdBackground);
    }

    /**
     * @test read
     */
    public function testReadBackground()
    {
        $background = $this->makeBackground();
        $dbBackground = $this->backgroundRepo->find($background->id);
        $dbBackground = $dbBackground->toArray();
        $this->assertModelData($background->toArray(), $dbBackground);
    }

    /**
     * @test update
     */
    public function testUpdateBackground()
    {
        $background = $this->makeBackground();
        $fakeBackground = $this->fakeBackgroundData();
        $updatedBackground = $this->backgroundRepo->update($fakeBackground, $background->id);
        $this->assertModelData($fakeBackground, $updatedBackground->toArray());
        $dbBackground = $this->backgroundRepo->find($background->id);
        $this->assertModelData($fakeBackground, $dbBackground->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteBackground()
    {
        $background = $this->makeBackground();
        $resp = $this->backgroundRepo->delete($background->id);
        $this->assertTrue($resp);
        $this->assertNull(Background::find($background->id), 'Background should not exist in DB');
    }
}

<?php

use App\Models\Download;
use App\Repositories\DownloadRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DownloadRepositoryTest extends TestCase
{
    use MakeDownloadTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DownloadRepository
     */
    protected $downloadRepo;

    public function setUp()
    {
        parent::setUp();
        $this->downloadRepo = App::make(DownloadRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDownload()
    {
        $download = $this->fakeDownloadData();
        $createdDownload = $this->downloadRepo->create($download);
        $createdDownload = $createdDownload->toArray();
        $this->assertArrayHasKey('id', $createdDownload);
        $this->assertNotNull($createdDownload['id'], 'Created Download must have id specified');
        $this->assertNotNull(Download::find($createdDownload['id']), 'Download with given id must be in DB');
        $this->assertModelData($download, $createdDownload);
    }

    /**
     * @test read
     */
    public function testReadDownload()
    {
        $download = $this->makeDownload();
        $dbDownload = $this->downloadRepo->find($download->id);
        $dbDownload = $dbDownload->toArray();
        $this->assertModelData($download->toArray(), $dbDownload);
    }

    /**
     * @test update
     */
    public function testUpdateDownload()
    {
        $download = $this->makeDownload();
        $fakeDownload = $this->fakeDownloadData();
        $updatedDownload = $this->downloadRepo->update($fakeDownload, $download->id);
        $this->assertModelData($fakeDownload, $updatedDownload->toArray());
        $dbDownload = $this->downloadRepo->find($download->id);
        $this->assertModelData($fakeDownload, $dbDownload->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDownload()
    {
        $download = $this->makeDownload();
        $resp = $this->downloadRepo->delete($download->id);
        $this->assertTrue($resp);
        $this->assertNull(Download::find($download->id), 'Download should not exist in DB');
    }
}

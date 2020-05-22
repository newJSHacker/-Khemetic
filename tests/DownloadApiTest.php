<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DownloadApiTest extends TestCase
{
    use MakeDownloadTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDownload()
    {
        $download = $this->fakeDownloadData();
        $this->json('POST', '/api/v1/downloads', $download);

        $this->assertApiResponse($download);
    }

    /**
     * @test
     */
    public function testReadDownload()
    {
        $download = $this->makeDownload();
        $this->json('GET', '/api/v1/downloads/'.$download->id);

        $this->assertApiResponse($download->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDownload()
    {
        $download = $this->makeDownload();
        $editedDownload = $this->fakeDownloadData();

        $this->json('PUT', '/api/v1/downloads/'.$download->id, $editedDownload);

        $this->assertApiResponse($editedDownload);
    }

    /**
     * @test
     */
    public function testDeleteDownload()
    {
        $download = $this->makeDownload();
        $this->json('DELETE', '/api/v1/downloads/'.$download->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/downloads/'.$download->id);

        $this->assertResponseStatus(404);
    }
}

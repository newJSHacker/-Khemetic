<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MediaAssocierApiTest extends TestCase
{
    use MakeMediaAssocierTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMediaAssocier()
    {
        $mediaAssocier = $this->fakeMediaAssocierData();
        $this->json('POST', '/api/v1/mediaAssociers', $mediaAssocier);

        $this->assertApiResponse($mediaAssocier);
    }

    /**
     * @test
     */
    public function testReadMediaAssocier()
    {
        $mediaAssocier = $this->makeMediaAssocier();
        $this->json('GET', '/api/v1/mediaAssociers/'.$mediaAssocier->id);

        $this->assertApiResponse($mediaAssocier->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMediaAssocier()
    {
        $mediaAssocier = $this->makeMediaAssocier();
        $editedMediaAssocier = $this->fakeMediaAssocierData();

        $this->json('PUT', '/api/v1/mediaAssociers/'.$mediaAssocier->id, $editedMediaAssocier);

        $this->assertApiResponse($editedMediaAssocier);
    }

    /**
     * @test
     */
    public function testDeleteMediaAssocier()
    {
        $mediaAssocier = $this->makeMediaAssocier();
        $this->json('DELETE', '/api/v1/mediaAssociers/'.$mediaAssocier->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/mediaAssociers/'.$mediaAssocier->id);

        $this->assertResponseStatus(404);
    }
}

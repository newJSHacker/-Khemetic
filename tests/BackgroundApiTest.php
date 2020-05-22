<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BackgroundApiTest extends TestCase
{
    use MakeBackgroundTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateBackground()
    {
        $background = $this->fakeBackgroundData();
        $this->json('POST', '/api/v1/backgrounds', $background);

        $this->assertApiResponse($background);
    }

    /**
     * @test
     */
    public function testReadBackground()
    {
        $background = $this->makeBackground();
        $this->json('GET', '/api/v1/backgrounds/'.$background->id);

        $this->assertApiResponse($background->toArray());
    }

    /**
     * @test
     */
    public function testUpdateBackground()
    {
        $background = $this->makeBackground();
        $editedBackground = $this->fakeBackgroundData();

        $this->json('PUT', '/api/v1/backgrounds/'.$background->id, $editedBackground);

        $this->assertApiResponse($editedBackground);
    }

    /**
     * @test
     */
    public function testDeleteBackground()
    {
        $background = $this->makeBackground();
        $this->json('DELETE', '/api/v1/backgrounds/'.$background->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/backgrounds/'.$background->id);

        $this->assertResponseStatus(404);
    }
}

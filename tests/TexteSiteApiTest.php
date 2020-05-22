<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TexteSiteApiTest extends TestCase
{
    use MakeTexteSiteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTexteSite()
    {
        $texteSite = $this->fakeTexteSiteData();
        $this->json('POST', '/api/v1/texteSites', $texteSite);

        $this->assertApiResponse($texteSite);
    }

    /**
     * @test
     */
    public function testReadTexteSite()
    {
        $texteSite = $this->makeTexteSite();
        $this->json('GET', '/api/v1/texteSites/'.$texteSite->id);

        $this->assertApiResponse($texteSite->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTexteSite()
    {
        $texteSite = $this->makeTexteSite();
        $editedTexteSite = $this->fakeTexteSiteData();

        $this->json('PUT', '/api/v1/texteSites/'.$texteSite->id, $editedTexteSite);

        $this->assertApiResponse($editedTexteSite);
    }

    /**
     * @test
     */
    public function testDeleteTexteSite()
    {
        $texteSite = $this->makeTexteSite();
        $this->json('DELETE', '/api/v1/texteSites/'.$texteSite->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/texteSites/'.$texteSite->id);

        $this->assertResponseStatus(404);
    }
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TexteSiteLangueApiTest extends TestCase
{
    use MakeTexteSiteLangueTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTexteSiteLangue()
    {
        $texteSiteLangue = $this->fakeTexteSiteLangueData();
        $this->json('POST', '/api/v1/texteSiteLangues', $texteSiteLangue);

        $this->assertApiResponse($texteSiteLangue);
    }

    /**
     * @test
     */
    public function testReadTexteSiteLangue()
    {
        $texteSiteLangue = $this->makeTexteSiteLangue();
        $this->json('GET', '/api/v1/texteSiteLangues/'.$texteSiteLangue->id);

        $this->assertApiResponse($texteSiteLangue->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTexteSiteLangue()
    {
        $texteSiteLangue = $this->makeTexteSiteLangue();
        $editedTexteSiteLangue = $this->fakeTexteSiteLangueData();

        $this->json('PUT', '/api/v1/texteSiteLangues/'.$texteSiteLangue->id, $editedTexteSiteLangue);

        $this->assertApiResponse($editedTexteSiteLangue);
    }

    /**
     * @test
     */
    public function testDeleteTexteSiteLangue()
    {
        $texteSiteLangue = $this->makeTexteSiteLangue();
        $this->json('DELETE', '/api/v1/texteSiteLangues/'.$texteSiteLangue->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/texteSiteLangues/'.$texteSiteLangue->id);

        $this->assertResponseStatus(404);
    }
}

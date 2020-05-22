<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SocialApiTest extends TestCase
{
    use MakeSocialTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSocial()
    {
        $social = $this->fakeSocialData();
        $this->json('POST', '/api/v1/socials', $social);

        $this->assertApiResponse($social);
    }

    /**
     * @test
     */
    public function testReadSocial()
    {
        $social = $this->makeSocial();
        $this->json('GET', '/api/v1/socials/'.$social->id);

        $this->assertApiResponse($social->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSocial()
    {
        $social = $this->makeSocial();
        $editedSocial = $this->fakeSocialData();

        $this->json('PUT', '/api/v1/socials/'.$social->id, $editedSocial);

        $this->assertApiResponse($editedSocial);
    }

    /**
     * @test
     */
    public function testDeleteSocial()
    {
        $social = $this->makeSocial();
        $this->json('DELETE', '/api/v1/socials/'.$social->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/socials/'.$social->id);

        $this->assertResponseStatus(404);
    }
}

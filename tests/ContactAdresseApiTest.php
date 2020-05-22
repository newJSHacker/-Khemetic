<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactAdresseApiTest extends TestCase
{
    use MakeContactAdresseTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateContactAdresse()
    {
        $contactAdresse = $this->fakeContactAdresseData();
        $this->json('POST', '/api/v1/contactAdresses', $contactAdresse);

        $this->assertApiResponse($contactAdresse);
    }

    /**
     * @test
     */
    public function testReadContactAdresse()
    {
        $contactAdresse = $this->makeContactAdresse();
        $this->json('GET', '/api/v1/contactAdresses/'.$contactAdresse->id);

        $this->assertApiResponse($contactAdresse->toArray());
    }

    /**
     * @test
     */
    public function testUpdateContactAdresse()
    {
        $contactAdresse = $this->makeContactAdresse();
        $editedContactAdresse = $this->fakeContactAdresseData();

        $this->json('PUT', '/api/v1/contactAdresses/'.$contactAdresse->id, $editedContactAdresse);

        $this->assertApiResponse($editedContactAdresse);
    }

    /**
     * @test
     */
    public function testDeleteContactAdresse()
    {
        $contactAdresse = $this->makeContactAdresse();
        $this->json('DELETE', '/api/v1/contactAdresses/'.$contactAdresse->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/contactAdresses/'.$contactAdresse->id);

        $this->assertResponseStatus(404);
    }
}

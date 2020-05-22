<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubscribApiTest extends TestCase
{
    use MakeSubscribTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSubscrib()
    {
        $subscrib = $this->fakeSubscribData();
        $this->json('POST', '/api/v1/subscribs', $subscrib);

        $this->assertApiResponse($subscrib);
    }

    /**
     * @test
     */
    public function testReadSubscrib()
    {
        $subscrib = $this->makeSubscrib();
        $this->json('GET', '/api/v1/subscribs/'.$subscrib->id);

        $this->assertApiResponse($subscrib->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSubscrib()
    {
        $subscrib = $this->makeSubscrib();
        $editedSubscrib = $this->fakeSubscribData();

        $this->json('PUT', '/api/v1/subscribs/'.$subscrib->id, $editedSubscrib);

        $this->assertApiResponse($editedSubscrib);
    }

    /**
     * @test
     */
    public function testDeleteSubscrib()
    {
        $subscrib = $this->makeSubscrib();
        $this->json('DELETE', '/api/v1/subscribs/'.$subscrib->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/subscribs/'.$subscrib->id);

        $this->assertResponseStatus(404);
    }
}

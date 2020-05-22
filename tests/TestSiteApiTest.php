<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestSiteApiTest extends TestCase
{
    use MakeTestSiteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTestSite()
    {
        $testSite = $this->fakeTestSiteData();
        $this->json('POST', '/api/v1/testSites', $testSite);

        $this->assertApiResponse($testSite);
    }

    /**
     * @test
     */
    public function testReadTestSite()
    {
        $testSite = $this->makeTestSite();
        $this->json('GET', '/api/v1/testSites/'.$testSite->id);

        $this->assertApiResponse($testSite->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTestSite()
    {
        $testSite = $this->makeTestSite();
        $editedTestSite = $this->fakeTestSiteData();

        $this->json('PUT', '/api/v1/testSites/'.$testSite->id, $editedTestSite);

        $this->assertApiResponse($editedTestSite);
    }

    /**
     * @test
     */
    public function testDeleteTestSite()
    {
        $testSite = $this->makeTestSite();
        $this->json('DELETE', '/api/v1/testSites/'.$testSite->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/testSites/'.$testSite->id);

        $this->assertResponseStatus(404);
    }
}

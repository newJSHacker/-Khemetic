<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProduitApiTest extends TestCase
{
    use MakeProduitTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProduit()
    {
        $produit = $this->fakeProduitData();
        $this->json('POST', '/api/v1/produits', $produit);

        $this->assertApiResponse($produit);
    }

    /**
     * @test
     */
    public function testReadProduit()
    {
        $produit = $this->makeProduit();
        $this->json('GET', '/api/v1/produits/'.$produit->id);

        $this->assertApiResponse($produit->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProduit()
    {
        $produit = $this->makeProduit();
        $editedProduit = $this->fakeProduitData();

        $this->json('PUT', '/api/v1/produits/'.$produit->id, $editedProduit);

        $this->assertApiResponse($editedProduit);
    }

    /**
     * @test
     */
    public function testDeleteProduit()
    {
        $produit = $this->makeProduit();
        $this->json('DELETE', '/api/v1/produits/'.$produit->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/produits/'.$produit->id);

        $this->assertResponseStatus(404);
    }
}

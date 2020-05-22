<?php

use App\Models\Produit;
use App\Repositories\ProduitRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProduitRepositoryTest extends TestCase
{
    use MakeProduitTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProduitRepository
     */
    protected $produitRepo;

    public function setUp()
    {
        parent::setUp();
        $this->produitRepo = App::make(ProduitRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProduit()
    {
        $produit = $this->fakeProduitData();
        $createdProduit = $this->produitRepo->create($produit);
        $createdProduit = $createdProduit->toArray();
        $this->assertArrayHasKey('id', $createdProduit);
        $this->assertNotNull($createdProduit['id'], 'Created Produit must have id specified');
        $this->assertNotNull(Produit::find($createdProduit['id']), 'Produit with given id must be in DB');
        $this->assertModelData($produit, $createdProduit);
    }

    /**
     * @test read
     */
    public function testReadProduit()
    {
        $produit = $this->makeProduit();
        $dbProduit = $this->produitRepo->find($produit->id);
        $dbProduit = $dbProduit->toArray();
        $this->assertModelData($produit->toArray(), $dbProduit);
    }

    /**
     * @test update
     */
    public function testUpdateProduit()
    {
        $produit = $this->makeProduit();
        $fakeProduit = $this->fakeProduitData();
        $updatedProduit = $this->produitRepo->update($fakeProduit, $produit->id);
        $this->assertModelData($fakeProduit, $updatedProduit->toArray());
        $dbProduit = $this->produitRepo->find($produit->id);
        $this->assertModelData($fakeProduit, $dbProduit->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProduit()
    {
        $produit = $this->makeProduit();
        $resp = $this->produitRepo->delete($produit->id);
        $this->assertTrue($resp);
        $this->assertNull(Produit::find($produit->id), 'Produit should not exist in DB');
    }
}

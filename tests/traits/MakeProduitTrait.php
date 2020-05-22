<?php

use Faker\Factory as Faker;
use App\Models\Produit;
use App\Repositories\ProduitRepository;

trait MakeProduitTrait
{
    /**
     * Create fake instance of Produit and save it in database
     *
     * @param array $produitFields
     * @return Produit
     */
    public function makeProduit($produitFields = [])
    {
        /** @var ProduitRepository $produitRepo */
        $produitRepo = App::make(ProduitRepository::class);
        $theme = $this->fakeProduitData($produitFields);
        return $produitRepo->create($theme);
    }

    /**
     * Get fake instance of Produit
     *
     * @param array $produitFields
     * @return Produit
     */
    public function fakeProduit($produitFields = [])
    {
        return new Produit($this->fakeProduitData($produitFields));
    }

    /**
     * Get fake data of Produit
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProduitData($produitFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'photo' => $fake->word,
            'prix' => $fake->word,
            'redirect_link' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $produitFields);
    }
}

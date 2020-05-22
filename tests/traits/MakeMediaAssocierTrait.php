<?php

use Faker\Factory as Faker;
use App\Models\MediaAssocier;
use App\Repositories\MediaAssocierRepository;

trait MakeMediaAssocierTrait
{
    /**
     * Create fake instance of MediaAssocier and save it in database
     *
     * @param array $mediaAssocierFields
     * @return MediaAssocier
     */
    public function makeMediaAssocier($mediaAssocierFields = [])
    {
        /** @var MediaAssocierRepository $mediaAssocierRepo */
        $mediaAssocierRepo = App::make(MediaAssocierRepository::class);
        $theme = $this->fakeMediaAssocierData($mediaAssocierFields);
        return $mediaAssocierRepo->create($theme);
    }

    /**
     * Get fake instance of MediaAssocier
     *
     * @param array $mediaAssocierFields
     * @return MediaAssocier
     */
    public function fakeMediaAssocier($mediaAssocierFields = [])
    {
        return new MediaAssocier($this->fakeMediaAssocierData($mediaAssocierFields));
    }

    /**
     * Get fake data of MediaAssocier
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMediaAssocierData($mediaAssocierFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'media_id' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'fichier' => $fake->word,
            'type' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $mediaAssocierFields);
    }
}

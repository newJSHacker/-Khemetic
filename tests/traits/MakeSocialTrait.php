<?php

use Faker\Factory as Faker;
use App\Models\Social;
use App\Repositories\SocialRepository;

trait MakeSocialTrait
{
    /**
     * Create fake instance of Social and save it in database
     *
     * @param array $socialFields
     * @return Social
     */
    public function makeSocial($socialFields = [])
    {
        /** @var SocialRepository $socialRepo */
        $socialRepo = App::make(SocialRepository::class);
        $theme = $this->fakeSocialData($socialFields);
        return $socialRepo->create($theme);
    }

    /**
     * Get fake instance of Social
     *
     * @param array $socialFields
     * @return Social
     */
    public function fakeSocial($socialFields = [])
    {
        return new Social($this->fakeSocialData($socialFields));
    }

    /**
     * Get fake data of Social
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSocialData($socialFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'link' => $fake->word,
            'image' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'update_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $socialFields);
    }
}

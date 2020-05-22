<?php

use Faker\Factory as Faker;
use App\Models\TexteSiteLangue;
use App\Repositories\TexteSiteLangueRepository;

trait MakeTexteSiteLangueTrait
{
    /**
     * Create fake instance of TexteSiteLangue and save it in database
     *
     * @param array $texteSiteLangueFields
     * @return TexteSiteLangue
     */
    public function makeTexteSiteLangue($texteSiteLangueFields = [])
    {
        /** @var TexteSiteLangueRepository $texteSiteLangueRepo */
        $texteSiteLangueRepo = App::make(TexteSiteLangueRepository::class);
        $theme = $this->fakeTexteSiteLangueData($texteSiteLangueFields);
        return $texteSiteLangueRepo->create($theme);
    }

    /**
     * Get fake instance of TexteSiteLangue
     *
     * @param array $texteSiteLangueFields
     * @return TexteSiteLangue
     */
    public function fakeTexteSiteLangue($texteSiteLangueFields = [])
    {
        return new TexteSiteLangue($this->fakeTexteSiteLangueData($texteSiteLangueFields));
    }

    /**
     * Get fake data of TexteSiteLangue
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTexteSiteLangueData($texteSiteLangueFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'langue_id' => $fake->randomDigitNotNull,
            'texte_site_id' => $fake->randomDigitNotNull,
            'section' => $fake->word,
            'code' => $fake->word,
            'texte' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $texteSiteLangueFields);
    }
}

<?php

use Faker\Factory as Faker;
use App\Models\TexteSite;
use App\Repositories\TexteSiteRepository;

trait MakeTexteSiteTrait
{
    /**
     * Create fake instance of TexteSite and save it in database
     *
     * @param array $texteSiteFields
     * @return TexteSite
     */
    public function makeTexteSite($texteSiteFields = [])
    {
        /** @var TexteSiteRepository $texteSiteRepo */
        $texteSiteRepo = App::make(TexteSiteRepository::class);
        $theme = $this->fakeTexteSiteData($texteSiteFields);
        return $texteSiteRepo->create($theme);
    }

    /**
     * Get fake instance of TexteSite
     *
     * @param array $texteSiteFields
     * @return TexteSite
     */
    public function fakeTexteSite($texteSiteFields = [])
    {
        return new TexteSite($this->fakeTexteSiteData($texteSiteFields));
    }

    /**
     * Get fake data of TexteSite
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTexteSiteData($texteSiteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'section' => $fake->word,
            'code' => $fake->word,
            'texte' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $texteSiteFields);
    }
}

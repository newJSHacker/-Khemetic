<?php

use Faker\Factory as Faker;
use App\Models\Background;
use App\Repositories\BackgroundRepository;

trait MakeBackgroundTrait
{
    /**
     * Create fake instance of Background and save it in database
     *
     * @param array $backgroundFields
     * @return Background
     */
    public function makeBackground($backgroundFields = [])
    {
        /** @var BackgroundRepository $backgroundRepo */
        $backgroundRepo = App::make(BackgroundRepository::class);
        $theme = $this->fakeBackgroundData($backgroundFields);
        return $backgroundRepo->create($theme);
    }

    /**
     * Get fake instance of Background
     *
     * @param array $backgroundFields
     * @return Background
     */
    public function fakeBackground($backgroundFields = [])
    {
        return new Background($this->fakeBackgroundData($backgroundFields));
    }

    /**
     * Get fake data of Background
     *
     * @param array $postFields
     * @return array
     */
    public function fakeBackgroundData($backgroundFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'image' => $fake->word,
            'type' => $fake->word,
            'page' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $backgroundFields);
    }
}

<?php

use Faker\Factory as Faker;
use App\Models\Subscrib;
use App\Repositories\SubscribRepository;

trait MakeSubscribTrait
{
    /**
     * Create fake instance of Subscrib and save it in database
     *
     * @param array $subscribFields
     * @return Subscrib
     */
    public function makeSubscrib($subscribFields = [])
    {
        /** @var SubscribRepository $subscribRepo */
        $subscribRepo = App::make(SubscribRepository::class);
        $theme = $this->fakeSubscribData($subscribFields);
        return $subscribRepo->create($theme);
    }

    /**
     * Get fake instance of Subscrib
     *
     * @param array $subscribFields
     * @return Subscrib
     */
    public function fakeSubscrib($subscribFields = [])
    {
        return new Subscrib($this->fakeSubscribData($subscribFields));
    }

    /**
     * Get fake data of Subscrib
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSubscribData($subscribFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'email' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $subscribFields);
    }
}

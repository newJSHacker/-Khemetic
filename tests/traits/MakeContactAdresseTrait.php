<?php

use Faker\Factory as Faker;
use App\Models\ContactAdresse;
use App\Repositories\ContactAdresseRepository;

trait MakeContactAdresseTrait
{
    /**
     * Create fake instance of ContactAdresse and save it in database
     *
     * @param array $contactAdresseFields
     * @return ContactAdresse
     */
    public function makeContactAdresse($contactAdresseFields = [])
    {
        /** @var ContactAdresseRepository $contactAdresseRepo */
        $contactAdresseRepo = App::make(ContactAdresseRepository::class);
        $theme = $this->fakeContactAdresseData($contactAdresseFields);
        return $contactAdresseRepo->create($theme);
    }

    /**
     * Get fake instance of ContactAdresse
     *
     * @param array $contactAdresseFields
     * @return ContactAdresse
     */
    public function fakeContactAdresse($contactAdresseFields = [])
    {
        return new ContactAdresse($this->fakeContactAdresseData($contactAdresseFields));
    }

    /**
     * Get fake data of ContactAdresse
     *
     * @param array $postFields
     * @return array
     */
    public function fakeContactAdresseData($contactAdresseFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'email' => $fake->word,
            'tel' => $fake->word,
            'nom' => $fake->word,
            'prenom' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $contactAdresseFields);
    }
}

<?php

use Faker\Factory as Faker;
use App\Models\Download;
use App\Repositories\DownloadRepository;

trait MakeDownloadTrait
{
    /**
     * Create fake instance of Download and save it in database
     *
     * @param array $downloadFields
     * @return Download
     */
    public function makeDownload($downloadFields = [])
    {
        /** @var DownloadRepository $downloadRepo */
        $downloadRepo = App::make(DownloadRepository::class);
        $theme = $this->fakeDownloadData($downloadFields);
        return $downloadRepo->create($theme);
    }

    /**
     * Get fake instance of Download
     *
     * @param array $downloadFields
     * @return Download
     */
    public function fakeDownload($downloadFields = [])
    {
        return new Download($this->fakeDownloadData($downloadFields));
    }

    /**
     * Get fake data of Download
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDownloadData($downloadFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'page' => $fake->randomDigitNotNull,
            'fichier' => $fake->word,
            'auth' => $fake->word,
            'description' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $downloadFields);
    }
}

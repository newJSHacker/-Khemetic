<?php

use Faker\Factory as Faker;
use App\Models\TestSite;
use App\Repositories\TestSiteRepository;

trait MakeTestSiteTrait
{
    /**
     * Create fake instance of TestSite and save it in database
     *
     * @param array $testSiteFields
     * @return TestSite
     */
    public function makeTestSite($testSiteFields = [])
    {
        /** @var TestSiteRepository $testSiteRepo */
        $testSiteRepo = App::make(TestSiteRepository::class);
        $theme = $this->fakeTestSiteData($testSiteFields);
        return $testSiteRepo->create($theme);
    }

    /**
     * Get fake instance of TestSite
     *
     * @param array $testSiteFields
     * @return TestSite
     */
    public function fakeTestSite($testSiteFields = [])
    {
        return new TestSite($this->fakeTestSiteData($testSiteFields));
    }

    /**
     * Get fake data of TestSite
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTestSiteData($testSiteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'section' => $fake->word,
            'code' => $fake->word,
            'texte' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $testSiteFields);
    }
}

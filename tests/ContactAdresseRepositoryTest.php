<?php

use App\Models\ContactAdresse;
use App\Repositories\ContactAdresseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactAdresseRepositoryTest extends TestCase
{
    use MakeContactAdresseTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContactAdresseRepository
     */
    protected $contactAdresseRepo;

    public function setUp()
    {
        parent::setUp();
        $this->contactAdresseRepo = App::make(ContactAdresseRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateContactAdresse()
    {
        $contactAdresse = $this->fakeContactAdresseData();
        $createdContactAdresse = $this->contactAdresseRepo->create($contactAdresse);
        $createdContactAdresse = $createdContactAdresse->toArray();
        $this->assertArrayHasKey('id', $createdContactAdresse);
        $this->assertNotNull($createdContactAdresse['id'], 'Created ContactAdresse must have id specified');
        $this->assertNotNull(ContactAdresse::find($createdContactAdresse['id']), 'ContactAdresse with given id must be in DB');
        $this->assertModelData($contactAdresse, $createdContactAdresse);
    }

    /**
     * @test read
     */
    public function testReadContactAdresse()
    {
        $contactAdresse = $this->makeContactAdresse();
        $dbContactAdresse = $this->contactAdresseRepo->find($contactAdresse->id);
        $dbContactAdresse = $dbContactAdresse->toArray();
        $this->assertModelData($contactAdresse->toArray(), $dbContactAdresse);
    }

    /**
     * @test update
     */
    public function testUpdateContactAdresse()
    {
        $contactAdresse = $this->makeContactAdresse();
        $fakeContactAdresse = $this->fakeContactAdresseData();
        $updatedContactAdresse = $this->contactAdresseRepo->update($fakeContactAdresse, $contactAdresse->id);
        $this->assertModelData($fakeContactAdresse, $updatedContactAdresse->toArray());
        $dbContactAdresse = $this->contactAdresseRepo->find($contactAdresse->id);
        $this->assertModelData($fakeContactAdresse, $dbContactAdresse->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteContactAdresse()
    {
        $contactAdresse = $this->makeContactAdresse();
        $resp = $this->contactAdresseRepo->delete($contactAdresse->id);
        $this->assertTrue($resp);
        $this->assertNull(ContactAdresse::find($contactAdresse->id), 'ContactAdresse should not exist in DB');
    }
}

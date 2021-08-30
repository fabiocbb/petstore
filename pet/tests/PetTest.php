<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class PetTest extends TestCase
{
    private $pets;

    public function setUp(): void
    {
        $this->pets = [
            "1" => ["id" => 1, "category" => 1, "name" => "checco", "photoUrls" => "[]", "tags" => "[1, 5]", "status" => "sold"],
            "2" => ["id" => 2, "category" => 2, "name" => "bb", "photoUrls" => "[]", "tags" => "[1, 2]", "status" => "available"],
            "3" => ["id" => 3, "category" => 2, "name" => "ccc", "photoUrls" => "[]", "tags" => "[2, 3]", "status" => "sold"],
            "4" => ["id" => 4, "category" => 3, "name" => "dddd", "photoUrls" => "[]", "tags" => "[2, 4]", "status" => "pending"],
            "5" => ["id" => 5, "category" => 2, "name" => "ringo 3", "photoUrls" => "[]", "tags" => "[2, 3, 4]", "status" => "pending", "created_at" => "2021-08-30T01:52:04.000000Z","updated_at" => "2021-08-30T01:52:04.000000Z"],
            "6" => ["id" => 6, "category" => 3, "name" => "ffffff", "photoUrls" => "[]", "tags" => "[2, 4]", "status" => "pending"],
        ];
        parent::setUp();
    }


    public function test_if_it_returns_all_pets()
    {
        $this->get('/');
        $this->assertEquals(200, $this->response->getStatusCode());
        $this->assertNotEquals(json_encode($this->pets), $this->response->getContent());
    }

    public function test_if_it_returns_the_requested_pet()
    {
        $pet = 5;
        $this->get('/' . $pet);
        $this->assertEquals(200, $this->response->getStatusCode());
        $this->assertEquals(json_encode($this->pets[$pet]), json_encode($this->response->baseResponse->original->data[0]));
    }

    public function test_if_it_returns_not_found_response_for_a_non_existed_pet()
    {
        $pet = 44;
        $this->get('/' . $pet);
        $this->assertEquals(404, $this->response->getStatusCode());
    }

}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Marke;
use App\Models\Metai;
use App\Models\Modeliai;

class EndpointTest extends TestCase
{
private Marke $marke;

    public function testGetMarkes(): void
    {
        $marke = $this->json('get', '/api/markes');
        // Check the chat's returned value
        $this->assertSame('Some parameters', $marke);
    }

    protected function setUp(): void
    {
        parent::setUp();
        // Create the user in the setup. This is run before each test method is run.
        // $this->marke = Marke::factory()->create();
        // Create the chat for the user (Pseudo code because I don't know how your code works)
        $this->marke->createMarke('Some parameters');
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        // Delete the user and chats here, pseudocode again. This runs after every test method is run
        $this->marke->deleteMarke();
        $this->marke->delete();
    }
}

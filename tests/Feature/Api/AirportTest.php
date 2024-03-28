<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AirportTest extends TestCase
{

    public function test_api_route_airports_search()
    {
        $response = $this->get('/api/airports-search?query=Merzbrueck');

        $response->assertStatus(200);

        $response->assertJsonFragment(['airport_name_en' => 'Merzbrueck', 'airport_name_ru' => 'Мерзбрук']);

    }
}

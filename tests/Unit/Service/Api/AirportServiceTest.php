<?php

namespace Tests\Unit\Service\Api;

use App\Service\Api\AirportService;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class AirportServiceTest extends TestCase
{

    public function test_search_airports()
    {

        $jsonPath = storage_path('app/public/airports_test.json');

        // call method search airport
        $query = 'Merz';
        $result = (new \App\Service\Api\AirportService)->searchAirports($jsonPath, $query);

        // Проверяем, что результат содержит ожидаемый аэропорт
        $expectedResult = [
            [
                'code' => 'AAH',
                'city_en' => 'Aachen',
                'city_ru' => 'Аахен',
                'airport_name_ru' => 'Мерзбрук',
                'airport_name_en' => 'Merzbrueck',
                'country' => 'DE',
                'timezone' => 'Europe/Berlin',
            ]
        ];

        $this->assertEquals($expectedResult, $result);
    }


    public function test_search_airports_with_multipleMatches()
    {

        $jsonPath = storage_path('app/public/airports_test.json');

        $query = 'Mer';
        $result = (new \App\Service\Api\AirportService)->searchAirports($jsonPath, $query);

        $this->assertNotEmpty($result);

        // check that the result contains the expected number of airports.
        $expectedCount = 12;
        $this->assertCount($expectedCount, $result);

        // check that each airport has the expected structure
        foreach ($result as $airport) {
            $this->assertArrayHasKey('code', $airport);
            $this->assertArrayHasKey('city_en', $airport);
            $this->assertArrayHasKey('city_ru', $airport);
            $this->assertArrayHasKey('airport_name_ru', $airport);
            $this->assertArrayHasKey('airport_name_en', $airport);
            $this->assertArrayHasKey('country', $airport);
            $this->assertArrayHasKey('timezone', $airport);

        }
    }

    public function testSearchAirportsWithRedisCache()
    {

        Cache::flush();

        $service = new AirportService();

        $jsonPath = storage_path('app/public/airports_test.json');

        // ask with search
        $query = "ls";

        // calling method search first time
        $result1 = $service->searchAirports($jsonPath, $query);

        $this->assertTrue(Cache::has($query));

        // calling method search second time
        $result2 = $service->searchAirports($jsonPath, $query);

        $this->assertEquals($result1, $result2);
    }
}

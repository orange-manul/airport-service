<?php

namespace App\Service\Api;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class AirportService
{
    public function searchAirports(string $jsonPath, string $query): array
    {
        try {
            // checking data cache
            $cachedResult = Cache::get($query);
            if ($cachedResult) {
                return $cachedResult;
            }

            // if not data in cache running search
            $jsonContent = file_get_contents($jsonPath);
            $airportsData = json_decode($jsonContent, true);

            $matchingAirports = [];
            if (!empty($airportsData)) {
                foreach ($airportsData as $code => $airportData) {

                    // check whether the airport name contains the required part
                    $airportNameRu = mb_strtolower($airportData['airportName']['ru'] ?? '', 'UTF-8');
                    $airportNameEn = mb_strtolower($airportData['airportName']['en'] ?? '', 'UTF-8');
                    $queryLower = mb_strtolower($query, 'UTF-8');

                    if (
                        stripos($airportNameRu, $queryLower) !== false ||
                        stripos($airportNameEn, $queryLower) !== false
                    ) {
                        $matchingAirports[] = [
                            'code' => $code,
                            'city_en' => $airportData['cityName']['en'] ?? null,
                            'city_ru' => $airportData['cityName']['ru'] ?? null,
                            'airport_name_ru' => $airportData['airportName']['ru'] ?? null,
                            'airport_name_en' => $airportData['airportName']['en'] ?? null,
                            'country' => $airportData['country'] ?? null,
                            'timezone' => $airportData['timezone'] ?? null,
                        ];
                    }
                }
            } else {
                throw new \Exception('No airport data found in the JSON file');
            }
            // Сохраняем результат в кэше на 1 час
            Cache::put($query, $matchingAirports, now()->addHours(1));

            return $matchingAirports;
        } catch (\Exception $exception) {
            // Логирование ошибок
            Log::error($exception->getMessage());
            return [];
        }
    }
}

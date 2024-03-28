<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Airport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AirportController extends Controller
{


    public function search(Request $request): JsonResponse
    {
        $jsonPath = storage_path('app/public/airports_test.json');

        // Получаем запрос из параметра query
        $query = $request->input('query');

        // Проверяем, был ли передан запрос
        if (empty($query)) {
            return response()->json(['error' => 'Параметр query не был передан.'], 400);
        }

        // Вызываем метод сервиса для поиска аэропортов
        $result = $this->airportService->searchAirports($jsonPath, $query);

        // Возвращаем результат в виде JSON-ответа
        return response()->json($result);
    }
}

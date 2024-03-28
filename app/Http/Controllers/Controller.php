<?php

namespace App\Http\Controllers;

use App\Service\Api\AirportService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected AirportService $airportService;

    public function __construct(AirportService $airportService)
    {
        $this->airportService = $airportService;
    }
}

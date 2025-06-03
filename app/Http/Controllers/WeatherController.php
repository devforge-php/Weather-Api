<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function show($city)
    {
        $weatherService = app()->make(WeatherService::class);
        $data = $weatherService->getWeather($city);

        return response()->json($data);
    }
}

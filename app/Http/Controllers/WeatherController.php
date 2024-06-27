<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Curl\Weather;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $weather = Weather::getWeatherDetails($request);

        return $weather;
    }
}

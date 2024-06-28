<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Curl\Forecast;
use App\Http\Curl\Places;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $placeDetails = [];

        $places = $this->getPlaces($request->search);
   
        foreach ($places->results as $place) {
            
            $placeDetails['places_info'][] = [
                'name' => $place->name,
                'address' => $place->location->formatted_address,
                'forecast' => $this->getForecast($place->geocodes->main->latitude, $place->geocodes->main->longitude)
            ];
        }
        return $placeDetails;
    }

    public function getForecast($lat, $lon)
    {
        return $weather = Forecast::getForecast($lat, $lon);
    }

    public function getPlaces($search)
    {
        return $details = Places::getPlaceDetails($search);
    }
}

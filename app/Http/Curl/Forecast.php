<?php

namespace App\Http\Curl;

use GuzzleHttp\Client;

class Forecast
{
    public static function getForecast($lat, $lon)
    {
        $client = new Client;

        $response = $client->request('GET', 'api.openweathermap.org/data/2.5/forecast?lat=' . $lat . '&lon=' . $lon . '&units=metric&cnt=5&appid=6c35fa36c8123a6bdc65afb4967e2f3e');
        $response = json_decode($response->getBody(), true);
      
        return $forecast = [
            'temp' => $response['list'][0]['main']['temp'],
            'description' => $response['list'][0]['weather'][0]['description']
        ];
    }
}
<?php

namespace App\Http\Curl;

use GuzzleHttp\Client;

class Weather
{
    public static function getWeatherDetails($params)
    {
        $client = new Client;

        $response = $client->request('GET', 'api.openweathermap.org/data/2.5/forecast?lat=' . $params['lat'] . '&lon=' . $params['lon'] . '&appid=6c35fa36c8123a6bdc65afb4967e2f3e');

        return json_decode($response->getBody());
    }
}
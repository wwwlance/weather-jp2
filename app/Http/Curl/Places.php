<?php

namespace App\Http\Curl;

use GuzzleHttp\Client;

class Places
{
    public static function getPlaceDetails($string)
    {
        $client = new Client;

        $response = $client->request('GET', 'https://api.foursquare.com/v3/places/search?near=' . $string, [
            'headers' => [
                'Authorization' => 'fsq3bZRxPCrgnKfMgVLgqieB2Tu0dcFn1f17EpRLZvzvTV8=',
                'accept' => 'application/json',
            ],
        ]);

        return json_decode($response->getBody());
    }
}
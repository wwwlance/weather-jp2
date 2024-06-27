<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Curl\Places;

class PlacesController extends Controller
{
    public function getPlaces($request)
    {
        $details = Places::getPlaceDetails($request);

        return $details;
    }
}

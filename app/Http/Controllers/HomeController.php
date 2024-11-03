<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Jenssegers\Agent\Facades\Agent;

class HomeController extends Controller
{
    public function index(Request $request) {
        $whoIsIp = $request->ip();
        $position = Location::get($whoIsIp);

        $device = $request->get('device');

        // dd($device);

        return view('welcome');
    }

    public function mapping(Request $request) {

        $getLocation = Location::get($request->ip());

        $getCountry = isset($getLocation->countryName) ? $getLocation->countryName : "Unknown Country";
        $getCityName = isset($getLocation->cityName) ? $getLocation->cityName : "Unknown City";
        $getLatitude = isset($getLocation->latitude) ? $getLocation->latitude : null;
        $getLongitude = isset($getLocation->longitude) ? $getLocation->longitude : null;

        $location = session('location');
        $lat = session('lat');
        $lng = session('lng');

        //earth radius
        $earthRadius = 6371;

        $dLat = deg2rad($lat - $getLatitude);
        $dLng = deg2rad($lng - $getLongitude);

        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos(deg2rad($getLatitude)) * cos(deg2rad($lat)) *
             sin($dLng / 2) * sin($dLng / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distanceKm = $earthRadius * $c;

        // Define average speeds for different modes of transportation in km/h
        $speeds = [
            'foot' => 5,     // Average walking speed
            'vehicle' => 60, // Average driving speed
            'bike' => 15,    // Average cycling speed
            'air' => 800     // Average flying speed (commercial airplane)
        ];

        $times = [];
        foreach ($speeds as $mode => $speed) {
            $times[$mode] = ($distanceKm / $speed) * 60; // Convert hours to minutes
        }



        return view('map', compact(['location', 'lat', 'lng', 'getCityName', 'getCountry', 'getLatitude', 'getLongitude', 'distanceKm', 'times']));
    }


}

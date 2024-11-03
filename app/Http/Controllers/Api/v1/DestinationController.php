<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use Jenssegers\Agent\Facades\Agent;

class DestinationController extends Controller
{
    public function store(Request $request) {

        session([
            'location' => $request->location,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);

        Location::create([
            'ip_address' => $request->ip(),
            'address' => $request->location,
            'latitude' => $request->lat,
            'longitude' => $request->lng
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Destination saved successfully.',
            'redirect' => route('roadtrippers')
        ]);
    }
}

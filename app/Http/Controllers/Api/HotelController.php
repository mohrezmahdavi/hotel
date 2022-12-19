<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelLog;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $popularity = Hotel::where('PlaceID', $request->place_id)->orderBy('Popularity', 'desc')->first();
        $cheapest = Hotel::where('PlaceID', $request->place_id)->where('MinRate', '!=' ,'')->where('MinRate', '!=' ,null)->orderBy('MinRate', 'asc')->first();
        $response = [
            'data' => [
                'cheapest' => $cheapest,
                'popularity' => $popularity
            ]
        ];
        HotelLog::create([
            'user_ip' => $request->ip(),
            'cheapest_id' => $cheapest?->id,
            'popularity_id' => $popularity?->id,
        ]);
        return response()->json($response);
    }
}

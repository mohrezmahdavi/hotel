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
        $popularity = Hotel::where('PlaceID', $request->place_id)->mostPopular()->first();
        $cheapest = Hotel::where('PlaceID', $request->place_id)->cheapest()->first();
        $this->createHotelSearchLog($request, $cheapest, $popularity);
        return $this->sendSuccessResponse($cheapest, $popularity);
    }

    private function createHotelSearchLog(Request $request, $cheapest, $popularity)
    {
        HotelLog::create([
            'user_ip' => $request->ip(),
            'cheapest_id' => $cheapest?->id,
            'popularity_id' => $popularity?->id,
            'place_id' => $request->place_id,
        ]);
    }

    private function sendSuccessResponse($cheapest, $popularity)
    {
        $response = [
            'data' => [
                'cheapest' => $cheapest,
                'popularity' => $popularity
            ]
        ];
        return response()->json($response);
    }
}

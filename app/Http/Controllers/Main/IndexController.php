<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $cites = $this->getHotels();
        return view('main.index.index', compact('cites'));
    }

    private function getHotels()
    {
        return Cache::rememberForever('cities', function () {
            return Hotel::select('PlaceID','PlaceName')->groupBy('PlaceID')
            ->get()->toArray();
        });   
    }
}

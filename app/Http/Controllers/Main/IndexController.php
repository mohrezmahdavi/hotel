<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $cites = Hotel::select('PlaceID','PlaceName')->groupBy('PlaceID')
        ->get()->toArray();
        return view('main.index.index', compact('cites'));
    }
}

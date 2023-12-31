<?php

namespace App\Http\Controllers;

use App\Http\Resources\WakebHotelResource;
use App\Service\WakeHotelService;
use Illuminate\Http\Request;

class WakeHotelController extends Controller
{
    public function index()
    {

        $hotels = new WakeHotelService();
        $data = $hotels->filterHotels();
        return response()->json([
            'status' => true,
            'message' => 'get filtered data',
            'count' => count($hotels->filterHotels()),
            'data' => WakebHotelResource::collection($data)
        ]);
    }
}

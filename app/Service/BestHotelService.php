<?php

namespace App\Service;

use App\Interface\HotelProviderInterface;
use GuzzleHttp\Client;

class BestHotelService implements HotelProviderInterface
{
    public function getHotelData()
    {
        $http = new Client();

        $response = $http->get('http://hotels-gateway.test/api/BestHotels');

        $data = $response->getBody()->getContents();
        $arrayOfObjects = json_decode($data);

        $bestHotelsWithProvider = array_map(function ($hotel) {
            return ['provider' => 'best_hotels'] + (array)$hotel;
        }, $arrayOfObjects->best_hotels);

        return $bestHotelsWithProvider;
    }
}

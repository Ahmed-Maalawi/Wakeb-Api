<?php

namespace App\Service;

use App\Interface\HotelProviderInterface;
use GuzzleHttp\Client;

class TopHotelService implements HotelProviderInterface
{
    public function getHotelData()
    {
        $http = new Client();

        $response = $http->get('http://hotels-gateway.test/api/TopHotels');

        $data = $response->getBody()->getContents();
        $jsonData = json_decode($data);

        $topHotelsWithProvider = array_map(function ($hotel) {
            return ['provider' => 'top_hotels'] + (array)$hotel;
        }, $jsonData->top_hotels);

        return $topHotelsWithProvider;
    }
}

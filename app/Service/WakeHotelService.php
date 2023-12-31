<?php

namespace App\Service;

use App\Interface\HotelProviderInterface;

class WakeHotelService
{
    protected $bestHotels;
    protected $topHotels;

    public function __construct()
    {
        $this->bestHotels = new BestHotelService();
        $this->topHotels = new TopHotelService();
    }

    public function filterHotels()
    {
        $topHotels = $this->bestHotels->getHotelData();
        $bestHotels = $this->topHotels->getHotelData();

        $mergedCollection = collect([...$topHotels, ...$bestHotels]);

        $sortedCollection = $mergedCollection->sortByDesc(function ($item) {
            // Use the appropriate attribute for rating from each model
            return isset($item['hotelRate']) ? $item['hotelRate'] : $item['rate'];
        });



        return $sortedCollection;
    }
}

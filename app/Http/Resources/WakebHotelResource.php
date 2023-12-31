<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WakebHotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'provider' => $this['provider'],
            'hotel' => $this['hotel'] ?? $this['hotelName'],
            'rating' => isset($this['hotelRate']) ? $this['hotelRate'] : $this['rate'],
            'fare' => $this['hotelFare'] ?? $this['price'],
            'amenities' => isset($this['roomAmenities']) ? explode(',', $this['roomAmenities']) : $this['amenities'],
        ];
    }
}

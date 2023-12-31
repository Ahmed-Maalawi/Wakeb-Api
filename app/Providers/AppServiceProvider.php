<?php

namespace App\Providers;

use App\Http\Controllers\WakeHotelController;
use App\Interface\HotelProviderInterface;
use App\Service\BestHotelService;
use App\Service\TopHotelService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(WakeHotelController::class)
            ->needs(HotelProviderInterface::class)
            ->give([TopHotelService::class, BestHotelService::class]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Models\booking;
use App\Models\Room;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $booking = booking::all();
        // foreach ($booking as $booking) {
        //     if ($booking->status === 'approved' && $booking->end_date < now()) {
        //         $booking->update(['status' => 'completed']);
        //     }
        // }
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        $rooms = Room::all();
        View::share('rooms', $rooms);
    }
}
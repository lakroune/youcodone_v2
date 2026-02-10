<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\User;
use App\Notifications\ReservationNotification;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    public function run(): void
    {
        Reservation::factory(100)->create()->each(function ($reservation) {
            $restaurant = $reservation->restaurant;
            if ($restaurant && $restaurant->user) {
                $restaurant->user->notify(new ReservationNotification($reservation));
            }
        });
    }
}

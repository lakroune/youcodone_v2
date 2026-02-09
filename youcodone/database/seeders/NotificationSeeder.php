<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Reservation;
use App\Notifications\ReservationNotification;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $reservation = Reservation::first();

        if ($user && $reservation) {
            $user->notify(new ReservationNotification($reservation));
        }
    }
}
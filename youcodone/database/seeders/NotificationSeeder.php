<?php

namespace Database\Seeders;

use App\Notifications\ReservationNotification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
    ReservationNotification::factory()->count(10)->create();
    }
}

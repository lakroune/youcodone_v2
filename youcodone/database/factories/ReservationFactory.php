<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_reservation' => fake()->date(),
            'heure_reservation' => fake()->time(),
            'nb_personne' => fake()->numberBetween(1, 10),
            'statut' => fake()->randomElement(['En attente', 'Acceptée', 'Refusée']),
            'user_id' => Client::factory(),
            'restaurant_id' => Restaurant::factory(),
        ];
    }
}

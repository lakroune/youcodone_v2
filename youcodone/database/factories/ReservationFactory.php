<?php

namespace Database\Factories;

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
            'date_reservation' => $this->faker->date(),
            'heure_reservation' => $this->faker->time(),
            'nb_personne' => $this->faker->numberBetween(1, 10),
            'statut' => $this->faker->randomElement(['En attente', 'Acceptée', 'Refusée']),
        ];
    }
}

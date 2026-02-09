<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paiement>
 */
class PaiementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_paiement' => fake()->date(),
            'montant' => fake()->randomFloat(2, 0, 100),
            'methode_paiement' => fake()->randomElement(['Visa', 'Mastercard', 'PayPal']),
            'reservation_id' => Reservation::factory(),
        ];
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Http\Requests\StorePaiementRequest;
use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaiementController extends Controller
{
    /**
     *  index function
     */
    public function index(Reservation $reservation)
    {
        $info_paiement = Reservation::with('restaurant')->find($reservation->id);


        return view('paiements.index', compact('info_paiement'));
    }

    /**
     * Création de la session Stripe
     */
    public function store(StorePaiementRequest $request)
    {
        $validated = (object) $request->validated();
        Stripe::setApiKey(config('services.stripe.secret') ?? env('STRIPE_SECRET'));
        $reservation =  Reservation::find($validated->reservation_id);
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'mad',
                    'product_data' => [
                        'name' => 'Réservation un Table de ' . $reservation->restaurant->nom_restaurant,
                        'description' => 'Référence Réservation: #' . $reservation->id . ' - Restaurant: #' . $reservation->restaurant->id,
                    ],
                    'unit_amount' => 20000,  // 20 MAD
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('paiement.success'), //. '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('paiement.cancel'),
        ]);

        // 
        return redirect($session->url);
    }

    public function success(Request $request)
    {
        return view('paiements.success');
    }

    public function cancel()
    {
        return view('paiements.cancel');
    }
}

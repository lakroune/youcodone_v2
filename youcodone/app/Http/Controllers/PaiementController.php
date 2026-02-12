<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Http\Requests\StorePaiementRequest;
use App\Models\Reservation;
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
        return view('paiements.index', compact('reservation'));
    }

    /**
     * Création de la session Stripe
     */
    public function store(StorePaiementRequest $request)
    {
        Stripe::setApiKey(config('services.stripe.secret') ?? env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'mad',
                    'product_data' => [
                        'name' => 'Réservation de Table - Gastronomie',
                        'description' => 'Référence Réservation: #' . $request->reservation_id,
                    ],
                    'unit_amount' => 20000,  // 20 MAD
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('paiement.success') . '?session_id={CHECKOUT_SESSION_ID}',
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

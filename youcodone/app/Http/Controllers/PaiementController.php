<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Reservation;
use App\Http\Requests\StorePaiementRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaiementController extends Controller
{
    /**
     * Display the payment summary page
     */
    public function index(Reservation $reservation)
    {
        $info_paiement = $reservation->load('restaurant');

        return view('paiements.index', compact('info_paiement'));
    }

    /**
     * Create Stripe Session and redirect user
     */
    public function store(StorePaiementRequest $request)
    {
        $validated = (object) $request->validated();

        // Initialize Stripe  
        Stripe::setApiKey(config('services.stripe.secret') ?? env('STRIPE_SECRET'));

        $reservation = Reservation::with('restaurant')->findOrFail($validated->reservation_id);

        // 1. Create the Stripe Checkout Session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'mad',
                    'product_data' => [
                        'name' => 'Table Reservation: ' . $reservation->restaurant->nom_restaurant,
                        'description' => 'Reservation Ref: #' . $reservation->id,
                    ],
                    'unit_amount' => 20000,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('paiement.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('paiement.cancel'),
        ]);

        if ($session->url && $session->id) {
            Paiement::create([
                'reservation_id' => $validated->reservation_id,
                'stripe_session_id' => $session->id,
                'date_paiement' => now(),
                'montant' => $validated->montant,
                'methode_paiement' => 'card',
                'statut' => 'pending',
            ]);
        }

        return redirect($session->url);
    }

    /**
     * Handle the return from Stripe after a successful payment
     */
    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');
        if ($sessionId) {
            $payment = Paiement::where('stripe_session_id', $sessionId)->firstOrFail()->get();
            if ($payment && $payment->statut !== 'pending') {
                DB::transaction(function () use ($payment) {
                    $payment->update(['statut' => 'completed']);
                    $payment->reservation->update(['statut' => 'payee']);
                });
            }
        }

        return view('paiements.success');
    }

    /**
     * Handle payment cancellation
     */
    public function cancel()
    {
        return view('paiements.cancel');
    }
}

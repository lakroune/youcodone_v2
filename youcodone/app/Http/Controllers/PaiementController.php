<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Reservation;
use App\Http\Requests\StorePaiementRequest;
use App\Models\Restaurant;
use App\Models\Restaurateur;
use App\Models\User;
use App\Notifications\ReservationNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaiementController extends Controller
{
    public function index(Reservation $reservation)
    {
        $info_paiement = $reservation->load('restaurant');
        return view('paiements.index', compact('info_paiement'));
    }

    public function store(StorePaiementRequest $request)
    {
        $validated = (object) $request->validated();
        Stripe::setApiKey(config('services.stripe.secret') ?? env('STRIPE_SECRET'));

        $reservation = Reservation::with('restaurant')->findOrFail($validated->reservation_id);

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Table Reservation: ' . $reservation->restaurant->nom_restaurant,
                        'description' => 'Reservation Ref: #' . $reservation->id,
                    ],
                    'unit_amount' => 200,
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
                'montant' => $validated->montant ?? 20,
                'methode_paiement' => 'card',
                'statut' => 'pending',
            ]);
        }

        return redirect($session->url);
    }
    /**
     * Handles the successful redirection from Stripe.
     * 
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');
        if (!$sessionId) {
            return redirect()->route('home')->with('error', 'error de paiement');
        }
        $payment = Paiement::where('stripe_session_id', $sessionId)->firstOrFail();
        $reservation = Reservation::with('restaurant')->findOrFail($payment->reservation_id);
        $restaurateur = Restaurateur::findOrFail($reservation->restaurant->user_id);
        // if ($payment->statut === 'pending') {
            try {
                DB::transaction(function () use ($payment, $reservation, $restaurateur) {
                    $payment->update([
                        'statut' => 'completed'
                    ]);
                    $reservation->update([
                        'statut' => 'payee'
                    ]);
                    $restaurateur->notify(new ReservationNotification($reservation));
                });
            } catch (Exception $e) {
                return redirect()->route('paiement.cancel')->with('error', 'error de paiement.');
            }
        // }

        return view('paiements.success', compact('payment', 'reservation'));
    }
    public function cancel()
    {
        return view('paiements.cancel');
    }
}

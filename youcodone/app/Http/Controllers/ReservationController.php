<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Horaire;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['restaurant.photos', 'paiement'])
            ->where('user_id', Auth::id())
            ->orderBy('date_reservation', 'desc')
            ->orderBy('heure_reservation', 'desc')
            ->paginate(6);

        return view('reservations', compact('reservations'));
    }

    public function create()
    {
        //
    }

    public function store(StoreReservationRequest $requestadd)
    {
        $request = (object) $requestadd->validated();

        $date = Carbon::parse($request->date_reservation);
        $heureFormatted = sprintf('%02d:00', $request->heure_reservation);
        $heure = Carbon::parse($heureFormatted);

        $joursFr = [
            'Sunday' => 'Dimanche',
            'Monday' => 'Lundi',
            'Tuesday' => 'Mardi',
            'Wednesday' => 'Mercredi',
            'Thursday' => 'Jeudi',
            'Friday' => 'Vendredi',
            'Saturday' => 'Samedi'
        ];
        $nomJour = $joursFr[$date->format('l')];

        $horaire = Horaire::where('restaurant_id', $request->restaurant_id)
            ->where('jour', $nomJour)
            ->first();

        if (!$horaire || $horaire->ferme) {
            return back()->withErrors(['date_reservation' => "Le restaurant est fermé le $nomJour."]);
        }

        $ouverture = Carbon::parse($horaire->heure_ouverture);
        $fermeture = Carbon::parse($horaire->heure_fermeture);
        $finReservation = (clone $heure)->addHours(2);

        if ($heure->lt($ouverture) || $finReservation->gt($fermeture)) {
            return back()->withErrors(['heure_reservation' => "L'heure doit être entre {$horaire->heure_ouverture} et " . $fermeture->subHours(2)->format('H:i')]);
        }

        Reservation::create([
            'date_reservation' => $date->format('Y-m-d'),
            'heure_reservation' => $heureFormatted,
            'statut' => 'En attente',
            'user_id' => Auth::id(),
            'restaurant_id' => $request->restaurant_id,
        ]);

        return back()->with('success', 'Votre demande de réservation a été envoyée.');
    }

    public function show(Reservation $reservation)
    {
        //
    }

    public function edit(Reservation $reservation)
    {
        //
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return back()->with('success', 'Votre demande de réservation a bien été supprimée.');
    }
}

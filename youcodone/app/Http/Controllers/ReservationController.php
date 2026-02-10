<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Horaire;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreReservationRequest $requestadd)
    {
        $request = $requestadd->validated();

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


    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}

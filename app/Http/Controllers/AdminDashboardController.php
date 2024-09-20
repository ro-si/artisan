<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReservationStatusNotification;

class AdminController extends Controller
{
    /**
     * Affiche le tableau de bord admin avec le nombre de réservations
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.dashboard', compact('reservations'));
    }

    /**
     * Valide une réservation
     *
     * @param int $reservationId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approveReservation($reservationId)
    {
        $reservation = Reservation::find($reservationId);
        if ($reservation) {
            $reservation->status = 'approved';
            $reservation->save();

            // Notification à l'artisan et au client
            $artisan = $reservation->service->prestataire;
            $client = $reservation->user;
            /* 
            Notification::send($artisan, new ReservationStatusNotification($reservation, 'approved'));
            Notification::send($client, new ReservationStatusNotification($reservation, 'approved'));
 */
            return redirect()->back()->with('success', 'Réservation approuvée avec succès.');
        }

        return redirect()->back()->with('error', 'Réservation non trouvée.');
    }

    /**
     * Annule une réservation
     *
     * @param int $reservationId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancelReservation($reservationId)
    {
        $reservation = Reservation::find($reservationId);
        if ($reservation) {
            $reservation->status = 'cancelled';
            $reservation->save();

            // Notification à l'artisan et au client
            $artisan = $reservation->service->prestataire;
            $client = $reservation->user;
            /* 
            Notification::send($artisan, new ReservationStatusNotification($reservation, 'cancelled'));
            Notification::send($client, new ReservationStatusNotification($reservation, 'cancelled'));
 */
            return redirect()->back()->with('success', 'Réservation annulée avec succès.');
        }

        return redirect()->back()->with('error', 'Réservation non trouvée.');
    }
}

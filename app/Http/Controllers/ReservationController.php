<?php

namespace App\Http\Controllers;

use App\Mail\ReservationConfirmed;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewReservationNotification;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'reservation_date' => 'required|date',
            'additional_notes' => 'nullable|string',
        ]);

        $reservation = new Reservation();
        $reservation->user_id = Auth::id();
        $reservation->service_id = $request->service_id;
        $reservation->reservation_date = $request->reservation_date;
        $reservation->additional_notes = $request->additional_notes;
        $reservation->save();

        // // Envoyer une notification à l'administrateur
        // $admin = User::where('role', 'admin')->first();
        // if ($admin) {
        //     Notification::send($admin, new NewReservationNotification($reservation));
        // }

        // Envoyer l'email de confirmation
        Mail::to($reservation->user->email)->send(new ReservationConfirmed($reservation));

        return redirect()->back()->with('success', 'Réservation effectuée avec succès.');
    }
}

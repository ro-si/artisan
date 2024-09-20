@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="my-4">Tableau de Bord Administrateur</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Réservations</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalReservations }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Réservations Récentes</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Utilisateur</th>
                                    <th>Service</th>
                                    <th>Date de Réservation</th>
                                    <th>Notes Supplémentaires</th>
                                    <th>Date Créée</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->id }}</td>
                                        <td>{{ $reservation->user->name }}</td>
                                        <td>{{ $reservation->service->name }}</td>
                                        <td>{{ $reservation->reservation_date }}</td>
                                        <td>{{ $reservation->additional_notes }}</td>
                                        <td>{{ $reservation->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $reservations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

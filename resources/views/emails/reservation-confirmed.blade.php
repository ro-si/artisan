<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Réservation</title>
</head>

<body>
    <h1>Bonjour {{ $reservation->user->name }},</h1>

    <p>Votre réservation pour le service {{ $reservation->service->name }} a bien été enregistrée.</p>
    <p>Date de réservation : {{ $reservation->reservation_date }}</p>
    <p>Notes supplémentaires : {{ $reservation->additional_notes }}</p>

    <p>Merci d'avoir choisi notre service !</p>

</body>

</html>

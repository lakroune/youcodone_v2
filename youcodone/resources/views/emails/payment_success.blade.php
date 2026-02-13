<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body style="background-color: #050505; color: #ffffff; font-family: 'serif'; padding: 40px; text-align: center;">
    <div style="border: 1px solid #FF5F00; padding: 20px; max-width: 600px; margin: 0 auto;">
        <h1 style="color: #FF5F00; text-transform: uppercase; letter-spacing: 5px;">Confirmation</h1>
        <p style="font-style: italic; font-size: 18px;">"Votre table est réservée."</p>
        <hr style="border: 0.5px solid #333;">
        <div style="text-align: left; padding: 10px 40px;">
            <p><strong>Restaurant:</strong> {{ $paiement->reservation->restaurant->nom_restaurant }}</p>
            <p><strong>Date:</strong> {{ $paiement->reservation->date_reservation }}</p>
            <p><strong>Heure:</strong> {{ $paiement->reservation->heure_reservation }}</p>
            <p><strong>Adresse:</strong> {{ $paiement->reservation->restaurant->adresse_restaurant }}</p>
            <p><strong>Telephone:</strong> {{ $paiement->reservation->restaurant->telephone_restaurant }}</p>
            <p><strong>payee le:</strong> {{ $paiement->date_paiement }}</p>
            <p><strong>montant:</strong> {{ $paiement->montant }}</p>
            <p><strong>Etat de la commande:</strong> {{ $paiement->statut }}</p>

        </div>
        <p style="color: #FF5F00; font-size: 12px; letter-spacing: 2px; margin-top: 30px;">Youcodone</p>
    </div>
</body>

</html>

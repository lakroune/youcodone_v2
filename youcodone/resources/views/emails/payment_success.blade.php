<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation de Réservation - Cibo Gustoso</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Inter:wght@300;400;500;600&display=swap');
        
        body {
            margin: 0;
            padding: 0;
            background-color: #f8f6f3;
            color: #1a1a1a;
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
        }
        
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
        }
        
        .header {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            padding: 40px 30px;
            text-align: center;
            position: relative;
        }
        
        .header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #FF6B35, #FF8C5A);
        }
        
        .logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }
        
        .logo-circle {
            width: 48px;
            height: 48px;
            border: 2px solid #FF6B35;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo-circle span {
            color: #FF6B35;
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            font-style: italic;
        }
        
        .logo-text {
            text-align: left;
        }
        
        .logo-text .brand {
            color: #ffffff;
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            font-style: italic;
            letter-spacing: -0.5px;
        }
        
        .logo-text .tagline {
            color: #FF6B35;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: 600;
        }
        
        .header-title {
            color: #FF6B35;
            font-family: 'Playfair Display', serif;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 4px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .header-quote {
            color: #ffffff;
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-style: italic;
            font-weight: 600;
            margin: 0;
        }
        
        .content {
            padding: 40px;
        }
        
        .confirmation-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #FF6B35;
            color: #ffffff;
            padding: 12px 24px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 30px;
        }
        
        .details-card {
            background: #faf9f7;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            border-left: 4px solid #FF6B35;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 12px 0;
            border-bottom: 1px solid #e5e5e5;
        }
        
        .detail-row:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            color: #666666;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 600;
            min-width: 120px;
        }
        
        .detail-value {
            color: #1a1a1a;
            font-size: 14px;
            font-weight: 500;
            text-align: right;
            font-family: 'Playfair Display', serif;
        }
        
        .detail-value.highlight {
            color: #FF6B35;
            font-weight: 700;
            font-size: 16px;
        }
        
        .restaurant-name {
            font-size: 20px;
            font-weight: 700;
            font-style: italic;
        }
        
        .message {
            text-align: center;
            color: #666666;
            font-size: 14px;
            line-height: 1.8;
            margin: 30px 0;
            font-style: italic;
        }
        
        .cta-button {
            display: inline-block;
            background: #1a1a1a;
            color: #ffffff;
            padding: 16px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 20px 0;
            transition: all 0.3s ease;
        }
        
        .cta-button:hover {
            background: #FF6B35;
        }
        
        .footer {
            background: #1a1a1a;
            padding: 30px;
            text-align: center;
        }
        
        .footer-logo {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 15px;
        }
        
        .footer-logo .logo-circle {
            width: 36px;
            height: 36px;
            border-color: #FF6B35;
        }
        
        .footer-logo .logo-circle span {
            font-size: 18px;
        }
        
        .footer-logo .brand {
            color: #ffffff;
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            font-weight: 700;
            font-style: italic;
        }
        
        .footer-text {
            color: #888888;
            font-size: 11px;
            letter-spacing: 1px;
        }
        
        .social-links {
            margin-top: 20px;
        }
        
        .social-links a {
            display: inline-block;
            width: 36px;
            height: 36px;
            background: #333333;
            border-radius: 50%;
            margin: 0 6px;
            line-height: 36px;
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.3s ease;
        }
        
        .social-links a:hover {
            background: #FF6B35;
        }
        
        @media only screen and (max-width: 600px) {
            .container {
                margin: 20px;
                border-radius: 12px;
            }
            
            .content {
                padding: 24px;
            }
            
            .details-card {
                padding: 20px;
            }
            
            .detail-row {
                flex-direction: column;
                gap: 4px;
            }
            
            .detail-value {
                text-align: left;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                <div class="logo-circle">
                    <span>C</span>
                </div>
                <div class="logo-text">
                    <div class="brand">Cibo Gustoso</div>
                    <div class="tagline">L'Art de la Gastronomie</div>
                </div>
            </div>
            <div class="header-title">Confirmation de Réservation</div>
            <h1 class="header-quote">"Votre table est réservée"</h1>
        </div>
        
        <!-- Content -->
        <div class="content">
            <div style="text-align: center;">
                <div class="confirmation-badge">
                    <span style="font-size: 16px;">✓</span>
                    Paiement Confirmé
                </div>
            </div>
            
            <div class="details-card">
                <div class="detail-row">
                    <span class="detail-label">Restaurant</span>
                    <span class="detail-value restaurant-name">{{ $paiement->reservation->restaurant->nom_restaurant }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Date</span>
                    <span class="detail-value">{{ \Carbon\Carbon::parse($paiement->reservation->date_reservation)->translatedFormat('d F Y') }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Heure</span>
                    <span class="detail-value highlight">{{ $paiement->reservation->heure_reservation }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Adresse</span>
                    <span class="detail-value" style="max-width: 200px;">{{ $paiement->reservation->restaurant->adresse_restaurant }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Téléphone</span>
                    <span class="detail-value">{{ $paiement->reservation->restaurant->telephone_restaurant }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Payé le</span>
                    <span class="detail-value">{{ \Carbon\Carbon::parse($paiement->date_paiement)->translatedFormat('d F Y à H:i') }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Montant</span>
                    <span class="detail-value highlight">{{ number_format($paiement->montant, 2) }} DH</span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Statut</span>
                    <span class="detail-value" style="color: #22c55e; text-transform: uppercase; font-size: 12px; letter-spacing: 1px;">{{ $paiement->statut }}</span>
                </div>
            </div>
            
            <p class="message">
                Nous avons le plaisir de confirmer votre réservation.<br>
                Notre équipe se réjouit de vous accueillir pour une expérience gastronomique unique.
            </p>
            
            <div style="text-align: center;">
                <a href="#" class="cta-button">Voir ma réservation</a>
            </div>
            
            <div style="text-align: center; margin-top: 30px; padding-top: 30px; border-top: 1px solid #e5e5e5;">
                <p style="color: #999999; font-size: 12px; line-height: 1.6;">
                    Une question ? Contactez-nous à<br>
                    <a href="mailto:reservations@cibogustoso.com" style="color: #FF6B35; text-decoration: none;">reservations@cibogustoso.com</a>
                </p>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <div class="footer-logo">
                <div class="logo-circle">
                    <span>C</span>
                </div>
                <span class="brand">Cibo Gustoso</span>
            </div>
            <p class="footer-text">L'art de la table, à portée de clic.</p>
            <div class="social-links">
                <a href="#">f</a>
                <a href="#">in</a>
                <a href="#">ig</a>
            </div>
            <p style="color: #555555; font-size: 10px; margin-top: 20px;">
                © {{ date('Y') }} Cibo Gustoso. Tous droits réservés.
            </p>
        </div>
    </div>
</body>

</html>
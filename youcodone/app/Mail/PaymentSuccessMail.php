<?php

namespace App\Mail;

use App\Models\Paiement;
use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $paiement;


    public function __construct(Paiement $paiement)
    {
        $this->paiement = $paiement;
    }

    public function build()
    {
        return $this->subject('Confirmation de votre réservation - Youcodone')
            ->view('emails.payment_success');
    }
}

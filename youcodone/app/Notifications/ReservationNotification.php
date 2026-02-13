<?php

namespace App\Notifications;

use App\Models\Client;
use App\Models\Reservation;
use App\Models\Restaurateur;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationNotification extends Notification
{
    use Queueable;

    protected $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Paid Reservation - #' . $this->reservation->id)
            ->greeting('Hello, ' . $notifiable->username)
            ->line('You have received a new paid reservation for your restaurant.')
            ->line('Reservation Date: ' . $this->reservation->date_reservation)
            ->line('Reservation Time: ' . $this->reservation->heure_reservation)
            ->action('View Reservation', url('/dashboard/reservations/' . $this->reservation->id))
            ->line('Thank you for being with us!');
    }

    public function toArray(object $notifiable): array
    {
        $client = Client::findOrFail($this->reservation->user_id);
        return [
            'reservation_id' => $this->reservation->id,
            'client_name' => $client->username,
            'message' => 'nouvelle reservation payee',
            'date' => $this->reservation->date_reservation,
            'time' => $this->reservation->heure_reservation,
        ];
    }
}

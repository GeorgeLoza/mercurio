<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class orpNotification extends Notification
{
    use Queueable;

    private $registro;

    /**
     * Create a new notification instance.
     */
    public function __construct($registro)
    {
        $this->registro = $registro;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database']; // Puedes agregar otros canales como mail, sms, etc.
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }
    //almacena la notificaiones en la base de datos
    public function toDatabase($notifiable)
    {
        return [
            'registro_id' => $this->registro->id,
            'message' => 'La Orp' . $this->registro->codigo . '-' . $this->registro->producto->nombre . ' inicio su produccion',
        ];
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Relative\LaravelExpoPushNotifications\PushNotification;
use Relative\LaravelExpoPushNotifications\ExpoPushNotifications;

use Illuminate\Notifications\Notification;

class KajianRequestNotif extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($title, $ustadz_name)
    {
        $this->title = $title;
        $this->ustadz_name = $ustadz_name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [ExpoPushNotifications::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toExpoPushNotification($notifiable)
    {
        return (new PushNotification)
            ->title('Permintaan menjadi Pendakwah di Masjid anda')
            ->body("Ustadz: {$this->ustadz_name}")
        ;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

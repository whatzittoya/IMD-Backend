<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Relative\LaravelExpoPushNotifications\PushNotification;
use Relative\LaravelExpoPushNotifications\ExpoPushNotifications;

use Illuminate\Notifications\Notification;

class UstadAcceptedNotif extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($kajian)
    {
        $this->kajian = $kajian;
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
            ->title("Anda diterima sebagai pendakwah di {$this->kajian->masjid->name}")
            ->body("Judul: {$this->kajian->kajian_title}")
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

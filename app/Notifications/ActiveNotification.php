<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Relative\LaravelExpoPushNotifications\PushNotification;
use Relative\LaravelExpoPushNotifications\ExpoPushNotifications;

class ActivateNotification extends Notification
{
    public function __construct($kajian)
    {
        $this->order = $kajian;
    }
    public function via($notifiable)
    {
        return [ExpoPushNotifications::class];
    }
    public function toExpoPushNotification($notifiable)
    {
        return (new PushNotification)
            ->title('New order received')
            ->body("Order #{$this->kajian->kajian_title} is ready for processing");
    }
}

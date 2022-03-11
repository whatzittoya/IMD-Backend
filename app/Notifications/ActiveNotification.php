<?php

use Illuminate\Notifications\Notification;
use NotificationChannels\ExpoPushNotifications\ExpoChannel;
use NotificationChannels\ExpoPushNotifications\ExpoMessage;

class ActivateNotification extends Notification
{
    public function via($notifiable)
    {
        return [ExpoChannel::class];
    }
    public function toExpoPush($notifiable)
    {
        return ExpoMessage::create()
        ->badge(1)
        ->enableSound()
        ->title("Account activated")
        ->body("Your account has been activated");
    }
}

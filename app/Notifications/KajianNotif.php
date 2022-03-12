<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Relative\LaravelExpoPushNotifications\PushNotification;
use Relative\LaravelExpoPushNotifications\ExpoPushNotifications;

use Illuminate\Notifications\Notification;

class KajianNotif extends Notification
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

    public function toExpoPushNotification($notifiable)
    {
        //send with access token
        // $expo = ExpoPushNotifications::normalSetup();
        // $expo->setAccessToken(env('ACCESS_TOKEN'));
        // $expo->setTitle('New Kajian');
        // $expo->setBody("Kajian #{$this->kajian->kajian_title} is ready for processing");
        // $expo->setData(['id' => $this->kajian->id]);
        // $expo->setTtl(60);
        // $expo->setExpiration(60);
        // $expo->setBadge(1);
        // $expo->setTopic('kajian');
        // $expo->setSound('default');
        // $expo->setChannelId('kajian');
        // $expo->setPriority('high');
        // $expo->setCollapseId('kajian');
        // $expo->setRestrictedPackageName('com.example.app');
        // $expo->setRestrictedPath('/path/to/restricted/resource');
        // $expo->setRestrictedPayload(['foo' => 'bar']);
        // $expo->send
        return (new PushNotification)
            ->title('Dakwah baru di Masjid '.$this->kajian->masjid->name)
            ->body("Judul: {$this->kajian->kajian_title}")
        ;
    }
}

<?php

namespace App\Notifications\Real_time;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;

class CommentSent extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private $data)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(): array
    {
        return [OneSignalChannel::class];
    }

   public function toOneSignal(){
        $messageData = $this->data['messageData'];

        return OneSignalMessage::create()
            ->setSubject($messageData['message'],'sent you a message')
            ->setBody($messageData['message'])
            ->setData('data',$messageData);
   }


}

<?php

namespace App\Notifications\activeAccount;

use App\Jobs\verify\NullifyVerificationCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class Active extends Notification implements ShouldQueue
{
    use Queueable;


    private $code;
    protected User $user;
    private $delayInSeconds;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->generateCode();
    }

    protected function generateCode()
    {
        $numericPart = mt_rand(100000, 999999); // Generate a random 6-digit number
        $verificationCode = $numericPart;
        $expiration = carbon::now()->addMinutes(30); // Expiry time: 30 minutes from now

        $this->user->verification_code = $verificationCode;
        $this->user->verification_code_expires_at = $expiration;
        $this->user->save();

        $this->code = $verificationCode;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('verify')
            ->line('thank you to register in our system')
            ->line('your code is :' . $this->code)
            ->line("your code is expired after 30 minutes ")
            ->line('see you ');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

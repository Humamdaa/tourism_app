<?php

namespace App\Notifications\resetPass;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Lang;

class ResetPassword extends Notification
{
    use Queueable;

    private $code;
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->generateCode();
    }

    public function generateCode()
    {
        $this->code = rand(100000, 999999);
        $temp_code = $this->code;

// Update the reset_code column for the user
        if ($this->user instanceof User) {
            // Encrypt the code and assign it to the reset_code property
            $this->user->reset_code = Crypt::encryptString($temp_code);
            $this->user->save();
        }
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
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(Lang::get('Reset Password Notification'))
            ->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
            ->line(Lang::get('Your password reset code is: ') . $this->code) // Use $this->code to access the property
            ->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]));

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

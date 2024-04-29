<?php

namespace App\Jobs\verify;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NullifyVerificationCode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function handle()
    {
        $user = User::find($this->userId);

        if ($user) {
            // Check if the verification code is expired
            if ($user->verification_code_expires_at <= now()) {
                $user->verification_code = null;
                $user->verification_code_expires_at = null;
                $user->save();
            }
        } else {
            \Log::warning("User with ID {$this->userId} not found.");
        }
    }

}

<?php

namespace App\Jobs\send;

use App\Models\User;
use App\Notifications\activeAccount\Active;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendVerificationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected User $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function handle():void
    {
        $this->user->notify(new Active($this->user));
    }
}

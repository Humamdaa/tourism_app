<?php

namespace App\Events;

use App\Models\hotels\hotel_comment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class newCommentSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(private hotel_comment $comment)
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('comments'),
        ];
    }

    //broadcast's event name
    public function broadcastAs(): string
    {
        return 'comment.sent';
    }

    //Data sending back to client
    public function broadcastWith(): array
    {
        // array format the data that I want to broadcast
        return [
            'comment' => $this->comment->toArray(),
        ];
    }
}

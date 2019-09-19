<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ClockIn implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $portuser;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($portuser)
    {
        $this->portuser = $portuser;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('clocking');
    }
}

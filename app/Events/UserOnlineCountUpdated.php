<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class UserOnlineCountUpdated implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $count;

    public function __construct($count)
    {
        $this->count = $count;
    }

    public function broadcastOn()
    {
        return new Channel('realtime-online-users');
    }
}

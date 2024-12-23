<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PageViewUpdated implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $page;
    public $views;

    public function __construct($page, $views)
    {
        $this->page = $page; // Đường dẫn của trang
        $this->views = $views; // Số lượt truy cập
    }

    // Broadcast trên kênh nào
    public function broadcastOn()
    {
        return new Channel('page-views'); // Public channel
    }

    // Dữ liệu gửi đi
    public function broadcastWith()
    {
        return [
            'page' => $this->page,
            'views' => $this->views,
        ];
    }
}

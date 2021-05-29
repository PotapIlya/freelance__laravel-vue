<?php

namespace App\Events\User\Chat;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageEvent implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * @var
     */
    public $message;

    /**
     * MessageEvent constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->message = $data;
    }


    /**
     * @return Channel|Channel[]
     */
    public function broadcastOn()
    {
        return new Channel('chat');
//        return new PresenceChannel('room.'.$this->message['id']);
    }

    /**
     * @return string
     */
    public function broadcastAs()
    {
        return 'NewMessage';
    }
}

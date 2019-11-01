<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

// use App\Models\User;

// class ServerCreated implements ShouldBroadcast
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class ServerCreated implements ShouldBroadcastNow
// class ServerCreated implements ShouldBroadcast

{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $id;
    // public $broadcastQueue = 'my-channel';

    public function __construct($message, $id)
    {
        $this->message  = $message;
        $this->id       = $id;
    }

    public function broadcastOn()
    {
        return ['my-channel'];
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
    // use SerializesModels;
    // // public $user;

    // /**
    //  * Create a new event instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     // $this->user = $user;
    // }

    // *
    //  * Get the channels the event should broadcast on.
    //  *
    //  * @return \Illuminate\Broadcasting\Channel|array
     
    // public function broadcastOn()
    // {
    //     // return new PrivateChannel('user.'.$this->user->id);
    //     return new PrivateChannel('channel1');
    //     // return ['channel1'];

    // }

    // public function broadcastAs()
    // {
    //     return 'ping';
    // }

    // public function broadcastWith()
    // {
    //     return ['id' => $this->user->id];
    // }

}


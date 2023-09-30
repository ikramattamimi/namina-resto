<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StatusLiked implements ShouldBroadcast{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $no_pesanan;

    public $nama_pelanggan;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($no_pesanan, $nama_pelanggan)
    {
        $this->no_pesanan = $no_pesanan;
        $this->nama_pelanggan  = $nama_pelanggan;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
  {
      return ['my-channel'];
  }

  public function broadcastAs()
  {
      return 'my-event';
  }
}

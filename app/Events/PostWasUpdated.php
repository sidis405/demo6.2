<?php

namespace App\Events;

use App\Post;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class PostWasUpdated
{
    public $post;

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}

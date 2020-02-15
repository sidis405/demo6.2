<?php

namespace App\Listeners;

use App\Events\PostWasUpdated;
use App\Jobs\NotifyUserForUpdatedPost;

class SendNotificationEmailListener
{
    public function handle(PostWasUpdated $event)
    {
        $recipient = $event->post->user;
        $post = $event->post;

        NotifyUserForUpdatedPost::dispatch($recipient, $post);
    }
}

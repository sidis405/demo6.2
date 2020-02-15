<?php

namespace App\Jobs;

use App\Post;
use App\User;
use Illuminate\Bus\Queueable;
use App\Mail\PostWasUpdatedEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NotifyUserForUpdatedPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $post;
    public $user;

    public function __construct(User $user, Post $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    public function handle()
    {
        echo("Dentro la classe Job - " . date('h:i:s') . "\n");
        sleep(3); //simulazione
        echo("Job Eseguito " . date('h:i:s') . "\n");

        Mail::to($this->user)->send(new PostWasUpdatedEmail($this->user, $this->post));
    }
}

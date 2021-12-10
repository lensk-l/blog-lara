<?php

namespace App\Listeners;

use App\Events\PostHasLiked;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LikeCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostHasLiked  $event
     * @return void
     */
    public function handle(PostHasLiked $event)
    {
        $event->article->increment('likes');
    }
}

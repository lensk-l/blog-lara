<?php

namespace App\Listeners;
use App\Models\Article;
use Illuminate\Broadcasting\InteractsWithSockets, Illuminate\Queue\SerializesModels;

use App\Events\PostHasViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ViewsCounter
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
     * @param  \App\Events\PostHasViewed  $event
     * @return void
     */
    public function handle(PostHasViewed $event)
    {
        $event->article->increment('views');
    }
}

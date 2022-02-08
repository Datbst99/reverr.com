<?php

namespace App\Listeners;

use App\Events\ViewCount;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseViews
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
     * @param  ViewCount  $event
     * @return void
     */
    public function handle(ViewCount $event)
    {
        //
    }
}

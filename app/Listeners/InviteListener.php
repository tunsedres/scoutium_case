<?php

namespace App\Listeners;

use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Mail;

class InviteListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->invitation->email)
            ->send(new InviteCreated($event->invitation));
    }
}

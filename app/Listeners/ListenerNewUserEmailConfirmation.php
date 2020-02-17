<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Events\EventNewUserRegister;
use App\Mail\EmailNewUserEmailConfirmation;
use Illuminate\Support\Facades\Mail;


class ListenerNewUserEmailConfirmation
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
     * @param  EventNewUserRegister  $event
     * @return void
     */
    public function handle(EventNewUserRegister $event)
    {
        Mail::to($event->user)
            ->send(new EmailNewUserEmailConfirmation($event->user));
    }
}

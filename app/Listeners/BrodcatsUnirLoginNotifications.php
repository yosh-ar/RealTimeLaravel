<?php

namespace App\Listeners;

use App\Events\UserSessionChange;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BrodcatsUnirLoginNotifications
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
    public function handle(login $event) //recibe los eventos 
    {
        broadcast(new UserSessionChange("{$event->user->name} is online" , 'success'));
    }
}

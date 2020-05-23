<?php

namespace App\Listeners;


use App\Events\UserSessionChange;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BrodcatsUnirLogoutNotifications
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
    public function handle(Logout $event) //recibe los eventos 
    {
        broadcast(new UserSessionChange("{$event->user->name} is offline" , 'danger'));
    }
}

<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Models\Website;
use App\Notifications\NewWebsiteNotification;
use Illuminate\Support\Facades\Notification;

class SendNewWebsiteNotification
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
    // $admins = User::where('user_type', 1)->get();
    // Notification::send($admins, new NewWebsiteNotification($event->website));
    }
}

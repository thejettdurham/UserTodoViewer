<?php

namespace UserTodo\Listeners;

use Illuminate\Support\Facades\Redis;
use UserTodo\Events\UserDataImported;

class UserDataPublisher
{
    /**
     * Handle the event.
     *
     * @param  UserDataImported $event
     * @return void
     */
    public function handle(UserDataImported $event)
    {
        // Publish a message containing the user who's data was updated
        Redis::publish($event->broadcastChannel, json_encode($event->user));
    }
}

<?php

namespace UserTodo\Listeners;

use Illuminate\Support\Facades\Log;
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
        Log::info("Got updated data for user {$event->user->username}");
    }
}

<?php

namespace App\Listeners;

use App\Events\SharedWith;
use App\Notifications\FollowedNotification;
use App\Notifications\SharedWithNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifySharedWith
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
     * @param  SharedWith  $event
     * @return void
     */
    public function handle(SharedWith $event)
    {

        $data = [
            'user' => $event->share->user_info->username,
            'avatar' => $event->share->user_info->avatar,
            'message' => $event->share->message,
            'volume_id' => $event->share->book_info->volume_id,
            'title' => $event->share->book_info->title,
            'thumbnail' => $event->share->book_info->thumbnail
        ];
        $event->share->shared_with->notify(new SharedWithNotification($data));
    }
}

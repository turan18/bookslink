<?php

namespace App\Listeners;

use App\Events\Followed;
use App\Models\User;
use App\Notifications\FollowedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyFollowed
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
     * @param  Followed  $event
     * @return void
     */
    public function handle(Followed $event)
    {

        $data = [
            'user' => User::find($event->follow->user_follower_id),
        ];
        User::find($event->follow->user_id)->notify(new FollowedNotification($data));
    }
}

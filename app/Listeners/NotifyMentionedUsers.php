<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\YouWereMentioned;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyMentionedUsers
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        tap($event->subject(), function ($subject) {
            User::whereIn('username', $this->mentionedUsers($subject))
                ->get()->each->notify(new YouWereMentioned($subject));
        });
    }

    public function mentionedUsers($content)
    {
        preg_match_all('/@([\w\-]+)/', $content, $matches);
        return $matches[1];
    }
}

<?php

namespace App\Actions;

use App\Models\Reply;
use Illuminate\Support\Str;

class CreateReply
{
    /**
     * Undocumented function
     *
     * @param Reply $reply
     * @return Reply
     */
    public function execute(array $attributes): Reply
    {
        return Reply::create([
            'content' => strip_tags($attributes['content']),
            'slug' => Str::random(10),
            'user_id' => auth()->id(),
            'topic_id' => $attributes['topic_id'],
        ]);
    }
}

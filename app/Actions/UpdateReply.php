<?php

namespace App\Actions;

use App\Models\Reply;
use Illuminate\Support\Str;

class UpdateReply
{
    /**
     * Undocumented function
     *
     * @param Reply $reply
     * @return Reply
     */
    public function execute(Reply $reply, array $attributes): Reply
    {
        $reply->update([
            'content' => strip_tags($attributes['content']),
        ]);

        return $reply;
    }
}

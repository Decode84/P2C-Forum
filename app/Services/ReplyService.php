<?php

namespace App\Services;

use App\Models\Reply;
use Illuminate\Support\Str;

class ReplyService extends BaseService
{
    /**
     * @param array $replyData
     * @return Reply
     */
    public function createReply(array $replyData): Reply
    {
        return Reply::create([
            'content' => strip_tags($replyData['content']),
            'slug' => Str::random(10),
            'user_id' => auth()->id(),
            'topic_id' => $replyData['topic_id'],
        ]);
    }

    /**
     * @param array $replyData
     * @return Reply
     */
    public function updateReply(array $data): Reply
    {
        $this->validate($data);

        $reply = Reply::where('slug', $data['slug'])->firstOrFail();

        $reply->update([
            'content' => strip_tags($data['content']),
        ]);

        return $reply;
    }
}

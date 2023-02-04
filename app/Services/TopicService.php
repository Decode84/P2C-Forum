<?php

namespace App\Services;

use App\Models\Topic;
use Illuminate\Support\Str;

class TopicService
{
    /**
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @var Topic $topic
     */
    public function createTopic(array $topicData): Topic
    {
        return Topic::create([
            'title' => $topicData['title'],
            'slug' => Str::random(10),
            'category_id' => $topicData['category_id'],
            'user_id' => auth()->id(),
        ]);
    }

    /**
     * @param array $topicData
     * @return Topic
     */
    public function updateTopic(array $topicData): Topic
    {
        $topic = Topic::find($topicData['id']);

        $topic->update([
            'title' => $topicData['title'],
        ]);

        return $topic;
    }
}

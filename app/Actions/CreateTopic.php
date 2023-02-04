<?php

namespace App\Actions;

use App\Models\Topic;
use Illuminate\Support\Str;

class CreateTopic
{
    /**
     * Undocumented function
     *
     * @param Topic $topic
     * @return Topic
     */
    public function execute(array $data)
    {
        return Topic::create([
            'title' => $data['title'],
            'slug' => Str::random(10),
            'category_id' => $data['category_id'],
            'user_id' => auth()->id(),
        ]);
    }
}

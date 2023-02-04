<?php

namespace App\Http\Controllers\Forum;

use App\Models\Topic;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Reply;

class ForumController extends Controller
{
    public function index(Topic $topic)
    {
        // Get the Reply model from the Topic model
        $replies = $topic->replies()->get();

        // Get the latest 5 replies from the database
        $latestReplies = Reply::latest()->take(5)->get();
        // $latestReplies = $topic->replies()->latest()->take(5)->get();

        // Get the latest 5 topics from the database
        $latestTopic = $topic->latest()->take(5)->get();

        // Fast query to get all the categories with topics
        $sections = Section::query()
            ->with('categories')
            ->get();

        return view('forum.index2', [
            'latestTopics' => $latestTopic,
            'latestReplies' => $latestReplies,
            'sections' => $sections,
            'topic' => $topic,
        ]);
    }
}

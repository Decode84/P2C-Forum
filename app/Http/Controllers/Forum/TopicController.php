<?php

namespace App\Http\Controllers\Forum;

use App\Models\Topic;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Services\ReplyService;
use App\Services\TopicService;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fast query to get all topics
        $topics = Topic::query()
            ->with('user')
            ->where('user_id', auth()->id())
            ->select('id', 'username', 'name', 'avatar')
            ->withCount('replies')
            ->latest()
            ->paginate(10);

        return view('topics.index', [
            'topics' => $topics,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('forum.topic.create', [
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTopicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopicRequest $request, TopicService $topicService, ReplyService $replyService)
    {
        $request->request->add(['content' => strip_tags($request->content)]);

        $topic = $topicService->createTopic($request->validated());
        $reply = $replyService->createReply($request->validated());

        return redirect()->route('forum.topic.show', [$topic->category, $topic])->with('success', 'Topic created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Topic $topic)
    {
        $replies = $topic->replies()->with('user')->paginate(5);

        // TODO: Make sure that the view count only increment when a user hasn't viewed the topic before
        $topic->increment('view_count');

        return view('forum.topic.show', [
            'topic' => $topic,
            'replies' => $replies,
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Category $category, Topic $topic)
    {
        // Check if the user is authorized to edit the topic
        $this->authorize('update', $topic);

        if ($request->user()->cannot('update', $topic)) {
            abort(403);
        }

        // Get the reply attached to the topic
        $reply = $topic->replies()->first();

        return view('forum.topic.edit', [
            'reply' => $reply,
            'category' => $category,
            'topic' => $topic,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTopicRequest  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, Topic $topic)
    {
        // Check if the user is authorized to edit the topic
        $this->authorize('update', $topic);

        // Check if the user is the owner of the topic and can update it
        if ($request->user()->cannot('update', $topic)) {
            abort(403);
        }

        // Update the topic in the database
        $topic->update([
            'title' => $request->title,
        ]);

        // Get the reply attached to the topic
        $reply = $topic->replies()->first();

        // Update the reply in the database
        $reply->update([
            'content' => $request->content,
        ]);

        // Redirect to the topic page
        return redirect()->route('forum.topic.show', [
            'category' => $category,
            'topic' => $topic,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        // Check if the user is authorized to delete the topic
        $this->authorize('delete', $topic);

        // If the topic is null then redirect to the topics page
        if ($topic === null) {
            return redirect()->route('forum.topic.index');
        }

        // Delete the topic
        $topic->delete();

        // Decrement the topic count of the user
        $topic->user->decrement('topic_count');

        // Decrement the topic count of the category
        $topic->category->decrement('topic_count');

        // Decrement the replies count of all the users who replied in the topic
        $topic->replies->each(function ($reply) {
            $reply->user->decrement('reply_count');
        });

        // Redirect to the topics page
        return redirect()->route('topic.index');
    }
}

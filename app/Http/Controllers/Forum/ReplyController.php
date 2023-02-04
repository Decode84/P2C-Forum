<?php

namespace App\Http\Controllers\Forum;

use App\Actions\CreateReply;
use App\Actions\UpdateReply;
use App\Models\Reply;
use App\Models\Topic;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplyRequest;
use App\Http\Requests\UpdateReplyRequest;

class ReplyController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReplyRequest $request, Category $category, Topic $topic, CreateReply $createReply)
    {
        if ($topic->locked) {
            return redirect()->back()->with('error', 'This topic is locked.');
        }

        $topic = $createReply->execute($request->validated());

        return redirect($topic->path())->with('success', 'Your reply has been posted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Topic $topic, Reply $reply)
    {
        // Check if the user is authorized to view the post
        // $this->authorize('view', $reply);

        return view('forum.reply.show', [
            'category' => $category,
            'topic' => $topic,
            'reply' => $reply,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, Topic $topic, Reply $reply)
    {
        return view('forum.reply.edit', [
            'category' => $category,
            'topic' => $topic,
            'reply' => $reply,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReplyRequest $request, Category $category, Topic $topic, Reply $reply, UpdateReply $updateReply)
    {
        $this->authorize('update', $reply);

        $reply = $updateReply->execute($reply, $request->validated());

        return redirect($reply->path())->with('success', 'Your reply has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic, Reply $reply)
    {
        $this->authorize('delete', $reply);
        $reply->delete();

        return redirect($topic->path())->with('success', 'Your reply has been deleted.');
    }
}

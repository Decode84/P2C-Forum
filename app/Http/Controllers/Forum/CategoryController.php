<?php

namespace App\Http\Controllers\Forum;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // If the user has already seen this category, we don't need to update the

        // last visit time. This is to prevent the category from being marked as
        // unread when the user visits the category index page.

        // Get all the topics for the category
        $topics = $category->topics()->with('user')->withCount('replies')->latest()->paginate(10);

        // Get the amount of replies posted in the past 24 hours
        $amountTopics = $category->topics()->withCount(['replies' => function ($query) {
            $query->where('created_at', '>=', now()->subDay());
        }])->get();

        /**
         * Return thew view with topics and categories
         *
         * @return \Illuminate\Http\Response
         */
        return view('forum.category.show', [
            'amountTopics' => $amountTopics,
            'category' => $category,
            'topics' => $topics,
        ]);
    }
}

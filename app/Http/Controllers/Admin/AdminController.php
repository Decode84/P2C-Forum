<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Reply;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        // Get the amount of users in the database
        $totalUsers = User::count();

        // Get the amount of topics and replies in the database
        $totalTopics = Topic::count();
        $totalReplies = Reply::count();

        // Get the 15 latest users to register
        $latestUsers = User::latest()->take(10)->get();

        return view('admin.index', [
            'latestUsers' => $latestUsers,
            'totalUsers' => $totalUsers,
            'totalTopics' => $totalTopics,
            'totalReplies' => $totalReplies,
        ]);
    }
}

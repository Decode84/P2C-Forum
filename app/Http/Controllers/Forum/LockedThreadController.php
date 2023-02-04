<?php

namespace App\Http\Controllers\Forum;

use App\Models\Topic;
use App\Http\Controllers\Controller;

class LockedThreadController extends Controller
{
    public function store(Topic $topic)
    {
        // Add some authorization logic here.
        $topic->update(['locked' => true]);
    }

    public function destroy(Topic $topic)
    {
        // Add some authorization logic here.
        $topic->update(['locked' => false]);
    }
}

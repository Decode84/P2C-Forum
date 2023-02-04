<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the user
        $user = auth()->user();

        return view('panel.index', [
            'user' => $user,
        ]);
    }

    public function updateHwid()
    {
        // Get the user
        $user = auth()->user();

        // Update the user
        $user->update([
            'hwid' => request('hwid'),
        ]);

        return redirect()->route('panel.index');
    }
}

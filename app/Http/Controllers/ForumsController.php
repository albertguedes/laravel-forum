<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Forum;

class ForumsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forums = Forum::all();
        return view('forums.index', compact('forums'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Forum $forum)
    {
        return view('forums.show', compact('forum'));
    }
}

<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;

use App\Models\Forum;
use App\Models\Topic;

class ForumsController extends Controller
{
    /**
     * Display a listing of the forums.
     */
    public function index(): View
    {
        $forums = Forum::select('slug', 'title', 'created_at', 'user_id', 'description')
                        ->withCount([ 'topics' => function($query) {
                            $query->where('is_active', true);
                        }])
                        ->where('is_active',true)
                        ->orderBy('created_at','DESC')
                        ->paginate(5);

        return view('forums.index', compact('forums'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Forum $forum): View
    {
        if (!$forum || !$forum->is_active) {
            abort(404);
        }

        $topics = Topic::select('slug', 'title', 'created_at', 'user_id', 'description')
                        ->withCount([ 'posts' => function($query) {
                            $query->where('published', true);
                        }])
                        ->where('forum_id', $forum->id)
                        ->where('is_active',true)
                        ->orderBy('created_at','DESC')
                        ->paginate(10);

        return view('forums.show', compact('forum', 'topics'));
    }

    public function create(): View
    {
        return view('forums.create');
    }
}

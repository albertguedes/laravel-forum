<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;

use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Forum;
use App\Models\Topic;
use App\Models\Post;

class TopicsController extends Controller
{
    public function index(?Forum $forum = null): View
    {
        $query = Topics::select('slug', 'title', 'created_at', 'user_id', 'description')
                        ->withCount(['posts' => function($query) {
                            $query->where('published', true);
                        }])
                        ->where('is_active',true)
                        ->orderBy('created_at','DESC');

        if ($forum) {
            if (!$forum->is_active) {
                abort(404);
            }
            $query = $query->where('forum_id', $forum->id);
        }

        $topics = $query->paginate(5);

        return view('forums.topics.index', compact('forum', 'topics'));
    }

    /**
     * Display the specified resource.
     */
    public function show(?Forum $forum = null, Topic $topic): View
    {
        $query = Post::select('id', 'slug', 'title', 'created_at', 'user_id', 'content', 'published')->withCount([ 'children' => function($query) {
                        $query->where('published', true);
                    }])->where('published', true)
                       ->orderBy('created_at','DESC')
                       ;

        if ($forum) {
            if (!$forum->is_active || (!$topic || !$topic->is_active) || $forum->id !== $topic->forum_id) {
                abort(404);
            }
        }

        if ($topic) {
            if (!$topic->is_active) {
                abort(404);
            }
            $query = $query->where('topic_id', $topic->id);
        }

        $posts = $query->paginate(5);

        return view('forums.topics.show', compact('forum', 'topic', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Forum $forum)
    {
        return view('forums.topics.create', compact('forum'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TopicStoreRequest $request)
    {
        $validate = $request->validated();
        $topic = Topic::create($validate);

        if (!$topic->exists) {
            return view('forums.topics.show',compact('topic'))->with('error','Topic could not be created');
        }

        return view('forums.topics.show',compact('topic'))->with('success','Topic created');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        return view('forums.topics.edit', compact('forum', 'topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        //
    }
}

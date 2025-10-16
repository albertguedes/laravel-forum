<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

use App\Models\Forum;
use App\Models\Post;
use App\Models\Topic;

class PostsController extends Controller
{
    /**
     * Display a listing of the posts independent of a topic o forum.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(?Forum $forum = null, ?Topic $topic = null): View
    {
        $query = Post::select('id', 'slug', 'title', 'created_at', 'user_id', 'description', 'content', 'published', 'children', 'parent')
                        ->withCount(['children' => function($query) {
                            $query->where('published', true);
                        }])
                        ->where('published',true);

        if ($forum) {
            if (!$forum->is_active || (!$topic || !$topic->is_active)) {
                abort(404);
            }
            $query = $query->where('topic_id', $topic->id);
        }

        $posts = $query->orderBy('update_at','DESC')->paginate(5);

        return view('forums.topics.posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\View\View
     */
    public function show (?Forum $forum = null, ?Topic $topic = null, Post $post) : View
    {
        return view('forums.topics.posts.show', compact( 'post'));
    }

    public function create(Forum $forum, Topic $topic, Request $request) : View
    {
        $reply = null;
        if ($request->has('reply')) {
            $reply = Post::find($request->get('reply'));
            if(!$reply->exists) {
                abort(404);
            }
            if ($reply->topic_id !== $topic->id) {
                abort(404);
            }
            if (!$reply->published) {
                abort(404);
            }
        }

        return view('forums.topics.posts.create', compact('forum','topic', 'reply'));
    }

    public function store(PostStoreRequest $request) : View
    {
        $validate = $request->validated();
        $post = Post::create($validate);

        if (!$post->exists) {
            return view('forums.topics.posts.show',compact('post'))->with('error','Post could not be created');
        }

        return view('forums.topics.posts.show',compact('post'))->with('success','Post created');
    }
}

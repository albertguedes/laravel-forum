<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;

use App\Models\Forum;
use App\Models\Post;
use App\Models\Topic;
use App\Models\User;

class UsersController extends Controller
{
    public function index(): View
    {
        $users = User::with('profile')
                    ->select('users.*')
                    ->where('is_active', true)
                    ->leftJoin('user_profiles', 'user_profiles.user_id', '=', 'users.id')
                    ->orderBy('user_profiles.username', 'ASC')
                    ->get();

        return view('users.index',compact('users'));
    }

    public function show(User $user): View
    {
        if(!$user || !$user->is_active) {
            abort(404);
        }

        $user_id = $user->id;

        $forums = Forum::select('slug', 'title', 'created_at', 'user_id', 'description', 'is_active')
                        ->where('user_id', $user_id)
                        ->withCount([ 'topics', 'posts' ])
                        ->orderBy('title', 'ASC')
                        ->get();

        $topics = Topic::select('slug', 'title', 'created_at', 'user_id', 'description', 'is_active', 'forum_id')
                        ->where('user_id', $user_id)
                        ->withCount('posts')
                        ->orderBy('title', 'ASC')
                        ->get();

        $posts = Post::select('slug', 'title', 'created_at', 'user_id', 'description', 'published', 'topic_id', 'parent_id')
                        ->with('topic')
                        ->withCount('children')
                        ->where('user_id', $user_id)
                        ->orderBy('title', 'ASC')
                        ->get();

        return view('users.show',compact('user', 'forums', 'topics', 'posts'));
    }
}

<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Models\Forum;
use App\Models\Post;
use App\Models\Topic;

use App\Http\Requests\Profile\UpdateRequest;
use App\Http\Requests\Profile\PasswordUpdateRequest;
use App\Http\Requests\Profile\DestroyRequest;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
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

        return view('profile.index',compact( 'forums', 'topics', 'posts'));
    }

    public function edit(): View
    {
        return view('profile.edit');
    }

    public function update(UpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $result = auth()->user()->update($validated['user']);
        if(!$result) {
            return redirect()->route('profile')
                             ->with([
                                'danger',
                                'Your profile has not been updated.'
                            ]);
        }

        $result = auth()->user()->profile->update($validated['profile']);
        if(!$result) {
            return redirect()->route('profile')
                             ->with([
                                'danger',
                                'Your profile has not been updated.'
                            ]);
        }

        return redirect()->route('profile')
                         ->with([
                            'success',
                            'Your profile has been updated.'
                        ]);
    }

    public function password(): View
    {
        return view('profile.password');
    }

    public function passwordUpdate(PasswordUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $result = auth()->user()->update([
            'password' => Hash::make($validated['user']['password'])
        ]);

        if(!$result) {
            return redirect()->route('profile')
                             ->with([
                                'danger',
                                'Your password has not been updated.'
                            ]);
        }

        return redirect()->route('profile')
                        ->with([
                            'success',
                            'Your password has been updated.'
                        ]);
    }

    public function delete(): View
    {
        return view('profile.delete');
    }

    public function destroy(DestroyRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if($validated['confirm'] != 1) {
            return redirect()->route('profile')
                             ->with([
                                'danger',
                                'Your profile has not been deleted.'
                            ]);
        }

        // Soft delete
        $result = auth()->user()->update([
            'is_active' => false
        ]);

        if(!$result) {
            return redirect()->route('profile')
                             ->with([
                                'danger',
                                'Your profile has not been deleted.'
                            ]);
        }

        return redirect()->route('auth.logout')
                         ->with([
                            'success',
                            'Your profile has been deleted.'
                         ]);
    }
}
